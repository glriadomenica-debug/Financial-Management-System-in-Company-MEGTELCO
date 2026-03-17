<?php
namespace App\Http\Controllers;
use App\Models\StatusPagamentu;
use Carbon\Carbon;
use App\Models\KlientePakotes;
use App\Models\PakoteInternet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  

class StatusPagamentuController extends Controller
{   
public function index(Request $request)
{
    $selectedMonth = $request->input('month', Carbon::now()->month);
    $selectedYear = $request->input('year', Carbon::now()->year);

    $previousMonth = $selectedMonth - 1;
    $previousYear = $selectedYear;
    if ($previousMonth == 0) {
        $previousMonth = 12;
        $previousYear--;
    }

    $klientePakotes = KlientePakotes::with([
            'pakote',
            'invoicesInstalls' => function($query) {
                $query->orderBy('created_at');
            },
            'printedInvoices' => function($query) use ($selectedMonth, $selectedYear) {
                $query->where('period_year', $selectedYear)
                      ->where('period_month', $selectedMonth)
                      ->where('is_printed', true); 
            },
            'statusPagamentus' => function($query) use ($selectedMonth, $selectedYear) {
                $query->where('month', $selectedMonth)
                    ->where('year', $selectedYear);
            },
            'allInvoices' => function($query) {
                $query->where('is_printed', true);              
            },
            'likidasauns',
            'likidasaunsInstalls',
            'previousStatus' => function($query) use ($previousMonth, $previousYear) {
                $query->where('month', $previousMonth)
                      ->where('year', $previousYear);
            }                   
        ])
        ->select('id', 'naran', 'nu_ref', 'pakote_id')
        ->get()
        ->map(function($kliente) use ($selectedMonth, $selectedYear, $previousMonth, $previousYear) {
            
            // buka status fulan antes
            $previousStatus = $kliente->previousStatus->first();
            
            // Kalkula Outstanding payment (use previous iha_devida if exists, otherwise calculate manually)
            $outstanding = 0;
            
            if ($previousStatus) {
                $outstanding = $previousStatus->iha_devida;
            } else {
                // Fallback calculation if no previous status record exists
                $previousInvoices = $kliente->allInvoices->filter(function($inv) use ($selectedMonth, $selectedYear) {
                    $invDate = Carbon::create($inv->period_year, $inv->period_month, 1);
                    $currentDate = Carbon::create($selectedYear, $selectedMonth, 1);
                    return $invDate->lt($currentDate);
                });
                
                $previousInstallations = $kliente->invoicesInstalls->filter(function($inv) use ($selectedMonth, $selectedYear) {
                    $invDate = Carbon::parse($inv->created_at);
                    $currentDate = Carbon::create($selectedYear, $selectedMonth, 1);
                    return $invDate->lt($currentDate);
                });
                
                $previousPayments = $kliente->likidasauns->filter(function($pay) use ($selectedMonth, $selectedYear) {
                    $payDate = Carbon::parse($pay->data_likidasaun);
                    $currentDate = Carbon::create($selectedYear, $selectedMonth, 1);
                    return $payDate->lt($currentDate);
                });
                
                $previousInstallPayments = $kliente->likidasaunsInstalls->filter(function($pay) use ($selectedMonth, $selectedYear) {
                    $payDate = Carbon::parse($pay->data);
                    $currentDate = Carbon::create($selectedYear, $selectedMonth, 1);
                    return $payDate->lt($currentDate);
                });

                $totalPreviousInvoices = $previousInvoices->sum('total');
                $totalPreviousInstallations = $previousInstallations->sum('total');
                $totalPreviousPayments = $previousPayments->sum('selu');
                $totalPreviousInstallPayments = $previousInstallPayments->sum('montante');

                $outstanding = max(0, ($totalPreviousInvoices + $totalPreviousInstallations) - 
                    ($totalPreviousPayments + $totalPreviousInstallPayments));
            }

            // Calculate new installation
            $newInstallation = $kliente->invoicesInstalls
                ->filter(function($inv) use ($selectedMonth, $selectedYear) {
                    return Carbon::parse($inv->created_at)->month == $selectedMonth &&
                           Carbon::parse($inv->created_at)->year == $selectedYear;
                })
                ->sum('total');

            $currentInvoice = $kliente->printedInvoices->sum('total');
            $totalFaktura = $newInstallation + $outstanding + $currentInvoice;

            $paymentAmount = $kliente->likidasauns->filter(function($pay) use ($selectedMonth, $selectedYear) {
                return Carbon::parse($pay->data_likidasaun)->month == $selectedMonth &&
                       Carbon::parse($pay->data_likidasaun)->year == $selectedYear;
            })->sum('selu');

            $installPayment = $kliente->likidasaunsInstalls->filter(function($pay) use ($selectedMonth, $selectedYear) {
                return Carbon::parse($pay->data)->month == $selectedMonth &&
                       Carbon::parse($pay->data)->year == $selectedYear;
            })->sum('montante');

            $debt = $totalFaktura - $paymentAmount - $installPayment;

            $kliente->new_installation = $newInstallation;
            $kliente->outstanding = $outstanding;
            $kliente->current_invoice = $currentInvoice;
            $kliente->total_faktura = $totalFaktura;
            $kliente->payment_amount = $paymentAmount;
            $kliente->install_payment = $installPayment;
            $kliente->debt = $debt;

            return $kliente;
        });
    
    return view('statuspagamentu.dadusPagamentu', [
        'title' => 'Dadus Pagamentu husi Kliente sira',
        'klientePakotes' => $klientePakotes,
        'currentMonth' => $selectedMonth,
        'currentYear' => $selectedYear,
        'previousMonth' => $previousMonth,
        'previousYear' => $previousYear,
        'months' => $this->getMonths(),
        'years' => $this->getYears(),
        'savedData' => $klientePakotes->flatMap(function($kliente) {
            return [$kliente->id => $kliente->statusPagamentus->first()];
        })->filter()
    ]);
}
    private function getMonths()
    {
        return [
            1 => 'Janeiru',
            2 => 'Fevereiru',
            3 => 'Marsu',
            4 => 'Abril',
            5 => 'Maiu',
            6 => 'Junu',
            7 => 'Jullu',
            8 => 'Agostu',
            9 => 'Setembru',
            10 => 'Outobru',
            11 => 'Novembru',
            12 => 'Dezembru',
        ];
    }

    private function getYears()
    {
        $startYear = 2020; 
        $currentYear = date('Y');
        $years = [];
        
        for ($year = $startYear; $year <= $currentYear; $year++) {
            $years[$year] = $year;
        }
        
        return $years;
    }
        public function save(Request $request)
        {
            Log::info('Save request received', $request->all());
            
            try {
                $validated = $request->validate([
                    'month' => 'required|integer|between:1,12',
                    'year' => 'required|integer|min:2020',
                    'data' => 'required|array'
                ]);
    
                $month = $validated['month'];
                $year = $validated['year'];
                $savedCount = 0;
    
                foreach ($validated['data'] as $klienteId => $paymentData) {
                    try {
                        $dataSelu = $this->parseDate($paymentData['data_selu'] ?? null);
                        $dataSeluInstalasaun = $this->parseDate($paymentData['data_selu_instalasaun'] ?? null);
    
                        StatusPagamentu::create([
                            'kliente_pakotes_id' => $klienteId,
                            'month' => $month,
                            'year' => $year,
                            'selu_ona' => $paymentData['selu_ona'] ?? 0,
                            'data_selu' => $dataSelu,
                            'selu_instalasaun' => $paymentData['selu_instalasaun'] ?? 0,
                            'data_selu_instalasaun' => $dataSeluInstalasaun,
                            'iha_devida' => $paymentData['iha_devida'] ?? 0,
                        ]);
                        
                        $savedCount++;
                        
                    } catch (\Exception $e) {
                        Log::error("Error saving kliente $klienteId: " . $e->getMessage());
                        continue;
                    }
                }
    
                return response()->json([
                    'success' => true, 
                    'message' => "Data saved successfully ($savedCount records)",
                    'saved_count' => $savedCount
                ]);
                
            } catch (\Exception $e) {
                Log::error('Save error: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Error saving data: ' . $e->getMessage()
                ], 500);
            }
        }
    
        public function update(Request $request)
        {
            Log::info('Update request received', $request->all());
            
            try {
                $validated = $request->validate([
                    'month' => 'required|integer|between:1,12',
                    'year' => 'required|integer|min:2020',
                    'data' => 'required|array'
                ]);
    
                $month = $validated['month'];
                $year = $validated['year'];
                $updatedCount = 0;
    
                foreach ($validated['data'] as $klienteId => $paymentData) {
                    try {
                        $dataSelu = $this->parseDate($paymentData['data_selu'] ?? null);
                        $dataSeluInstalasaun = $this->parseDate($paymentData['data_selu_instalasaun'] ?? null);
    
                        StatusPagamentu::where([
                            'kliente_pakotes_id' => $klienteId,
                            'month' => $month,
                            'year' => $year
                        ])->update([
                            'selu_ona' => $paymentData['selu_ona'] ?? 0,
                            'data_selu' => $dataSelu,
                            'selu_instalasaun' => $paymentData['selu_instalasaun'] ?? 0,
                            'data_selu_instalasaun' => $dataSeluInstalasaun,
                            'iha_devida' => $paymentData['iha_devida'] ?? 0,
                        ]);
                        
                        $updatedCount++;
                        
                    } catch (\Exception $e) {
                        Log::error("Error updating kliente $klienteId: " . $e->getMessage());
                        continue;
                    }
                }
    
                return response()->json([
                    'success' => true, 
                    'message' => "Data updated successfully ($updatedCount records)",
                    'updated_count' => $updatedCount
                ]);
                
            } catch (\Exception $e) {
                Log::error('Update error: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating data: ' . $e->getMessage()
                ], 500);
            }
        }
    
        private function parseDate($dateString)
        {
            if (empty($dateString)) {
                return null;
            }
    
            try {
                return Carbon::createFromFormat('d/m/Y', $dateString)->format('Y-m-d');
            } catch (\Exception $e) {
                Log::error("Failed to parse date '$dateString': " . $e->getMessage());
                return null;
            }
        }

        public function report()
{
    $months = [
        1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
        4 => 'Abril', 5 => 'Maiu', 6 => 'Junu',
        7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
        10 => 'Outobru', 11 => 'Novembru', 12 => 'Dezembru'
    ];
    
    $years = $this->getYears();
    $tipuPakotes = PakoteInternet::all();
    
    return view('statuspagamentu.reportSP', [
        'title' => 'Relatoriu Status Pagamentu',
        'months' => $months,
        'years' => $years,
        'tipuPakotes' => $tipuPakotes
    ]);
}


public function generateReport(Request $request)
{
    
        $request->validate([
        'report_type' => 'required|in:paid,unpaid,both',
        'month' => 'required|integer|between:1,12',
        'year' => 'required|integer|min:2020',
        'kliente_pakotes_id' => 'nullable|exists:klientepakotes,id'
    ]);

    $month = $request->month;
    $year = $request->year;
    $previousMonth = $month - 1;
    $previousYear = $year;
    
    if ($previousMonth == 0) {
        $previousMonth = 12;
        $previousYear--;
    }

    $monthName = $this->getMonths()[$month];

    try {
        $query = KlientePakotes::with([
            'pakote',
            'statusPagamentus' => function($query) use ($month, $year) {
                $query->where('month', $month)
                      ->where('year', $year);
            },
            'printedInvoices' => function($query) use ($month, $year) {
                $query->where('period_year', $year)
                      ->where('period_month', $month)
                      ->where('is_printed', true);
            },
            'invoicesInstalls' => function($query) {
                $query->where('is_printed', true);
            },
            'likidasauns',
            'likidasaunsInstalls',
            'previousStatus' => function($query) use ($previousMonth, $previousYear) {
                $query->where('month', $previousMonth)
                      ->where('year', $previousYear);
            }
        ]);

        if ($request->kliente_pakotes_id) {
            $query->where('id', $request->kliente_pakotes_id);
        }

        if ($request->pakote_id) {
            $query->where('pakote_id', $request->pakote_id);
        }

        $klientes = $query->get()->map(function($kliente) use ($month, $year, $previousMonth, $previousYear) {
            $status = $kliente->statusPagamentus->first();
            
            // Get previous month's status
            $previousStatus = $kliente->previousStatus->first();
            
            // Calculate outstanding (use previous iha_devida if exists, otherwise calculate manually)
            $outstanding = 0;
            
            if ($previousStatus) {
                $outstanding = $previousStatus->iha_devida;
            } else {
                // Fallback calculation if no previous status record exists
                $previousInvoices = $kliente->allInvoices->filter(function($inv) use ($month, $year) {
                    $invDate = Carbon::create($inv->period_year, $inv->period_month, 1);
                    $currentDate = Carbon::create($year, $month, 1);
                    return $invDate->lt($currentDate);
                });
                
                $previousInstallations = $kliente->invoicesInstalls->filter(function($inv) use ($month, $year) {
                    $invDate = Carbon::parse($inv->created_at);
                    $currentDate = Carbon::create($year, $month, 1);
                    return $invDate->lt($currentDate);
                });
                
                $previousPayments = $kliente->likidasauns->filter(function($pay) use ($month, $year) {
                    $payDate = Carbon::parse($pay->data_likidasaun);
                    $currentDate = Carbon::create($year, $month, 1);
                    return $payDate->lt($currentDate);
                });
                
                $previousInstallPayments = $kliente->likidasaunsInstalls->filter(function($pay) use ($month, $year) {
                    $payDate = Carbon::parse($pay->data);
                    $currentDate = Carbon::create($year, $month, 1);
                    return $payDate->lt($currentDate);
                });

                $totalPreviousInvoices = $previousInvoices->sum('total');
                $totalPreviousInstallations = $previousInstallations->sum('total');
                $totalPreviousPayments = $previousPayments->sum('selu');
                $totalPreviousInstallPayments = $previousInstallPayments->sum('montante');

                $outstanding = max(0, ($totalPreviousInvoices + $totalPreviousInstallations) - 
                    ($totalPreviousPayments + $totalPreviousInstallPayments));
            }


            $newInstallation = $kliente->invoicesInstalls
                ->filter(function($inv) use ($month, $year) {
                    return Carbon::parse($inv->created_at)->month == $month &&
                           Carbon::parse($inv->created_at)->year == $year;
                })
                ->sum('total');

            $currentInvoice = $kliente->printedInvoices->sum('total');
            $totalFaktura = $newInstallation + $outstanding + $currentInvoice;

            $paymentAmount = $kliente->likidasauns->filter(function($pay) use ($month, $year) {
                return Carbon::parse($pay->data_likidasaun)->month == $month &&
                       Carbon::parse($pay->data_likidasaun)->year == $year;
            })->sum('selu');

            $installPayment = $kliente->likidasaunsInstalls->filter(function($pay) use ($month, $year) {
                return Carbon::parse($pay->data)->month == $month &&
                       Carbon::parse($pay->data)->year == $year;
            })->sum('montante');

            $debt = $totalFaktura - $paymentAmount - $installPayment;
            $isPaid = $debt <= 0;

            if ($status) {
                return [
                    'kliente' => $kliente,
                    'nu_ref' => $kliente->nu_ref,
                    'naran' => $kliente->naran,
                    'pakote' => $kliente->pakote ? $kliente->pakote->pakote : 'La iha',
                    'new_installation' => $status->new_installation ?? $newInstallation,
                    'outstanding' => $status->outstanding ?? $outstanding,
                    'current_invoice' => $status->current_invoice ?? $currentInvoice,
                    'total_faktura' => $status->total_faktura ?? $totalFaktura,
                    'payment_amount' => $status->selu_ona ?? $paymentAmount,
                    'payment_date' => $status->data_selu ? Carbon::parse($status->data_selu)->format('d/m/Y') : '',
                    'install_payment' => $status->selu_instalasaun ?? $installPayment,
                    'install_date' => $status->data_selu_instalasaun ? Carbon::parse($status->data_selu_instalasaun)->format('d/m/Y') : '',
                    'debt' => $status->iha_devida ?? $debt,
                    'is_paid' => $status->selu_ona >= $status->total_faktura
                ];
            }

            return [
                'kliente' => $kliente,
                'nu_ref' => $kliente->nu_ref,
                'naran' => $kliente->naran,
                'pakote' => $kliente->pakote ? $kliente->pakote->pakote : 'La iha',
                'new_installation' => $newInstallation,
                'outstanding' => $outstanding,
                'current_invoice' => $currentInvoice,
                'total_faktura' => $totalFaktura,
                'payment_amount' => $paymentAmount,
                'payment_date' => $kliente->likidasauns->filter(function($pay) use ($month, $year) {
                    return Carbon::parse($pay->data_likidasaun)->month == $month &&
                           Carbon::parse($pay->data_likidasaun)->year == $year;
                })->first() ? Carbon::parse($kliente->likidasauns->first()->data_likidasaun)->format('d/m/Y') : '',
                'install_payment' => $installPayment,
                'install_date' => $kliente->likidasaunsInstalls->filter(function($pay) use ($month, $year) {
                    return Carbon::parse($pay->data)->month == $month &&
                           Carbon::parse($pay->data)->year == $year;
                })->first() ? Carbon::parse($kliente->likidasaunsInstalls->first()->data)->format('d/m/Y') : '',
                'debt' => $debt,
                'is_paid' => $isPaid,
                'status' => null
            ];
        });

        if ($request->report_type === 'paid') {
            $klientes = $klientes->filter(function($item) {
                return $item['is_paid'] === true;
            });
        } elseif ($request->report_type === 'unpaid') {
            $klientes = $klientes->filter(function($item) {
                return $item['is_paid'] === false;
            });
        }

        $stats = [
            'total_klientes' => $klientes->count(),
            'total_paid' => $klientes->where('is_paid', true)->count(),
            'total_unpaid' => $klientes->where('is_paid', false)->count(),
            'total_revenue' => $klientes->sum('payment_amount') + $klientes->sum('install_payment'),
            'total_debt' => $klientes->sum('debt'),
            'total_current_invoice' => $klientes->sum('current_invoice'), 
            'total_expected_income' => $klientes->sum('total_faktura') 
        ];

        return view('statuspagamentu.reportViewSP', [
            'title' => "Relatoriu Status Pagamentu - Fulan $monthName $year",
            'klientes' => $klientes,
            'stats' => $stats,
            'reportType' => $request->report_type,
            'month' => $month,
            'year' => $year,
            'monthName' => $monthName,
            'pakote' => $request->pakote_id ? PakoteInternet::find($request->pakote_id)->pakote : null
        ]);

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
    }
  
