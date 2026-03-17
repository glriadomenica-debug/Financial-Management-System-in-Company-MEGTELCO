<?php

namespace App\Http\Controllers;
use App\Models\likidasaun_instalasaun;
// use App\Models\Kliente;
use App\Models\InvoiceInstall;
use App\Models\MetoduPagamentu;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LikInstallController extends Controller
{
    public function index()
    {
        $likidasauns_instalasaun = likidasaun_instalasaun::with(['invoiceInstall', 'metoduPagamentu'])->get();    
        // $likidasauns_instalasaun = likidasaun_instalasaun::with('kliente')->get(); 
        return view('likidasaun_instalasaun.dadusLikInstall', compact('likidasauns_instalasaun'),[
            'title'=>'Dadus Selu Instalasaun'
        ]);
    }
    public function create()
    {
        $invoiceInstalls = InvoiceInstall::whereNotIn('id', function($query) {
            $query->select('invoice_installs_id')->from('likidasauns_install');
        })->get();
        
        $metodu_pagamentus = MetoduPagamentu::all(); 
        return view('likidasaun_instalasaun.aumentaLikInstall', compact('invoiceInstalls','metodu_pagamentus'),[
            'title'=>'Aumenta dadus Selu instalasaun'
        ]);
    } 

    // public function getInvoiceData($invoiceinstallId)
    // {
    //     $invoiceInstalls = InvoiceInstall::findOrFail($invoiceinstallId);
    //     $monthName = \Carbon\Carbon::create()->month($invoiceInstalls->period_month)->translatedFormat('F');
    //     $year = $invoiceInstalls->period_year;
    //     $deskrisaun = "Fornesimentu Servisu Instalasaun Internet $monthName tinan $year";
    //     return response()->json([
    //         'deskrisaun' => $deskrisaun,
    //         'montante' => $invoiceInstalls->total,
    //         'naran' => $invoiceInstalls->naran 
    //     ]);
    // }   
    
  public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            // 'naran'=>'required|string|max:255',
            'invoice_installs_id' => 'required|exists:invoice_installs,id',
            // 'kliente_id' => 'required|exists:klientes,id',
            'deskrisaun' => 'required|string|max:255',
            'metodu_pagamentu_id' => 'required|exists:metodu_pagamentus,id',
            'montante' => 'required|numeric',
           
        ]);
        $invoiceInstalls= InvoiceInstall::findOrFail($request->invoice_installs_id);
        $naran = $invoiceInstalls->naran;
        likidasaun_instalasaun::create([
            'data' => $request->data,
            'naran'=>$naran,
            // 'kliente_id' => $request->input('kliente_id'),
            'invoice_installs_id' => $request->invoice_installs_id,
            'deskrisaun' => $request->deskrisaun,
            'metodu_pagamentu_id' => $request->metodu_pagamentu_id,
            'montante' => $request->montante,            
        ]);
        return redirect()->route('likidasaun_instalasaun.dadusLikInstall')->with('susesu', 'Dadus rai ona!');
    }

    public function edit($id)
    {
        $LikIns = likidasaun_instalasaun::findOrFail($id);        
        // $invoiceInstalls = InvoiceInstall::whereNotIn('id', function($query) use ($id) {
        //         $query->select('invoice_installs_id')
        //             ->from('likidasauns_install')
        //             ->where('id', '!=', $id);
        //     })
        //     ->orWhere('id', $LikIns->invoice_installs_id)
        //     ->get();
        $invoiceInstalls = InvoiceInstall::findOrFail($LikIns->invoice_installs_id);
            
        $metodu_pagamentus = MetoduPagamentu::all();

        return view('likidasaun_instalasaun.editLikInstall', compact('LikIns', 'invoiceInstalls','metodu_pagamentus'),[
            'title'=>'Edit dadus selu Instalasaun'
        ]); 
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'data' => 'required|date',
        // 'kliente_id' => 'required|exists:klientes,id',
        // 'naran'=>'required|string|max:255',
        'invoice_installs_id' => 'required|exists:invoice_installs,id',
        'deskrisaun' => 'required|string',
        'metodu_pagamentu_id' => 'required|exists:metodu_pagamentus,id',
        // 'tipu_transaksaun'=>'required|string',
        'montante' => 'required|numeric',
        
    ]);

    $invoiceInstalls= InvoiceInstall::findOrFail($request->invoice_installs_id);
    $naran = $invoiceInstalls->naran;

    $LikIns = likidasaun_instalasaun::findOrFail($id);
    $LikIns->update([
        'data' => $request->data,
        // 'kliente_id' => $request->kliente_id,
        'naran'=>$naran,
        'invoice_installs_id' => $request->invoice_installs_id,
        'deskrisaun' => $request->deskrisaun,
        'metodu_pagamentu_id' => $request->metodu_pagamentu_id,
        // 'tipu_transaksaun'=>$request->tipu_transaksaun,
        'montante' => $request->montante,
        
    ]);

    // return redirect()->route('likidasaun.dadusLikidasaun')->with('success', 'Dadus likidasaun update ho susesu!');
    return redirect()->route('likidasaun_instalasaun.dadusLikInstall');

}

public function destroy($id)
    {
        $LikIns = likidasaun_instalasaun::findOrFail($id);
        $LikIns->delete();

        DB::statement('ALTER TABLE likidasauns_install AUTO_INCREMENT = 1');

        return redirect()->route('likidasaun_instalasaun.dadusLikInstall')->with('susesu', 'Dadus hamoos ona.');
    }

    public function report()
    {
        $months = [
            1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
            4 => 'Abril', 5 => 'Maiu', 6 => 'Juñu',
            7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
            10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
        ];
    return view('likidasaun_instalasaun.reportLikInstall', [
        'title' => 'Relatoriu Likidasaun Instalasaun',
        'months'=>$months
    ]);
    }

// public function generateReport(Request $request)
// {
//     $request->validate([
//         'report_type' => 'required|in:annual,monthly',
//         'year' => 'required_if:report_type,annual|nullable|numeric',
//         'month' => 'required_if:report_type,monthly|nullable|numeric|between:1,12',
//         'year_monthly' => 'required_if:report_type,monthly|nullable|numeric',
//     ]);

//     $reportType = $request->report_type;
    
//     try {
//         if ($reportType == 'annual') {
//             $year = $request->year;
//             $likidasauns_instalasaun = likidasaun_instalasaun::with('metoduPagamentu')
//                 ->whereYear('data', $year)
//                 ->orderBy('data')
//                 ->get();
//             $paymentMethods = $likidasauns_instalasaun->groupBy('metodu_pagamentu_id')->map(function($items) {
//                 return [
//                     'naran' => $items->first()->metoduPagamentu->metodu_selu, 
//                     'total' => $items->sum('montante')
//                     // 'count' => $items->count()
//                 ];
//             });
            
//             $title = "Relatoriu Likidasaun Instalasaun Tinan $year";
            
//             $stats = [
//                 'total_likidasaun' => $likidasauns_instalasaun->sum('montante'),
//                 'total_transactions' => $likidasauns_instalasaun->count(),
//                 'payment_methods' => $paymentMethods
//             ];
        
//             return view('likidasaun_instalasaun.reportViewLikInstall', [
//                 'title' => $title,
//                 'stats' => $stats,
//                 'reportType' => $reportType,
//                 'year' => $year,
//                 'data' => $likidasauns_instalasaun
//             ]);
          
//         } elseif ($reportType == 'monthly') {
//             $year = $request->year_monthly;
//             $month = $request->month;
//             $likidasauns_instalasaun = likidasaun_instalasaun::with('metoduPagamentu')
//                 ->whereYear('data', $year)
//                 ->whereMonth('data', $month)
//                 ->orderBy('data')
//                 ->get();
//             $paymentMethods = $likidasauns_instalasaun->groupBy('metodu_pagamentu_id')->map(function($items) {
//                 return [
//                     'naran' => $items->first()->metoduPagamentu->metodu_selu,
//                     'total' => $items->sum('montante')
//                     // 'count' => $items->count()
//                 ];
//             });

//             $monthName = $this->getMonth($month);
//             $title = "Relatoriu Likidasaun Instalasaun Fulan $monthName $year";
            
//             $stats = [
//                 'total_likidasaun' => $likidasauns_instalasaun->sum('montante'),
//                 'total_transactions' => $likidasauns_instalasaun->count(),
//                 'payment_methods' => $paymentMethods
//             ];

//             return view('likidasaun_instalasaun.reportViewLikInstall', [
//                 'title' => $title,
//                 'stats' => $stats,
//                 'reportType' => $reportType,
//                 'month' => $monthName,
//                 'year' => $year,
//                 'data' => $likidasauns_instalasaun
//             ]);
//         }
        
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
//     }
// }
    // private function getMonth($monthNumber)
    // {
    //     $fulanTetum = [
    //         1 => 'Janeiru',
    //         2 => 'Fevereiru',
    //         3 => 'Marsu',
    //         4 => 'Abril',
    //         5 => 'Maiu',
    //         6 => 'Juñu',
    //         7 => 'Jullu',
    //         8 => 'Agostu',
    //         9 => 'Setembru',
    //         10 => 'Outubru',
    //         11 => 'Novembru',
    //         12 => 'Dezembru'
    //     ];

    //     return $fulanTetum[$monthNumber] ?? 'la eziste';
    // }
    public function generateReport(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:annual,monthly,year_comparison,month_comparison',
            'year' => 'required_if:report_type,annual,year_comparison|nullable|numeric',
            'month' => 'required_if:report_type,monthly,month_comparison|nullable|numeric|between:1,12',
            'year_monthly' => 'required_if:report_type,monthly,month_comparison|nullable|numeric',
            'comparison_year' => 'required_if:report_type,year_comparison|nullable|numeric',
            'comparison_month' => 'required_if:report_type,month_comparison|nullable|numeric|between:1,12',
        ]);

        $reportType = $request->report_type;
        
        try {
            if ($reportType == 'annual') {
                $year = $request->year;
                $likidasauns_instalasaun = likidasaun_instalasaun::with('metoduPagamentu')
                    ->whereYear('data', $year)
                    ->orderBy('data')
                    ->get();
                $paymentMethods = $likidasauns_instalasaun->groupBy('metodu_pagamentu_id')->map(function($items) {
                    return [
                        'naran' => $items->first()->metoduPagamentu->metodu_selu, 
                        'total' => $items->sum('montante')
                    ];
                });
                
                $title = "Relatoriu Likidasaun Instalasaun Tinan $year";
                
                $stats = [
                    'total_likidasaun' => $likidasauns_instalasaun->sum('montante'),
                    'total_transactions' => $likidasauns_instalasaun->count(),
                    'payment_methods' => $paymentMethods
                ];
            
                return view('likidasaun_instalasaun.reportViewLikInstall', [
                    'title' => $title,
                    'stats' => $stats,
                    'reportType' => $reportType,
                    'year' => $year,
                    'data' => $likidasauns_instalasaun
                ]);
            }
            elseif ($reportType == 'monthly') {
                $year = $request->year_monthly;
                $month = $request->month;
                $likidasauns_instalasaun = likidasaun_instalasaun::with('metoduPagamentu')
                    ->whereYear('data', $year)
                    ->whereMonth('data', $month)
                    ->orderBy('data')
                    ->get();
                $paymentMethods = $likidasauns_instalasaun->groupBy('metodu_pagamentu_id')->map(function($items) {
                    return [
                        'naran' => $items->first()->metoduPagamentu->metodu_selu,
                        'total' => $items->sum('montante')
                    ];
                });

                $monthName = $this->getMonth($month);
                $title = "Relatoriu Likidasaun Instalasaun Fulan $monthName $year";
                
                $stats = [
                    'total_likidasaun' => $likidasauns_instalasaun->sum('montante'),
                    'total_transactions' => $likidasauns_instalasaun->count(),
                    'payment_methods' => $paymentMethods
                ];

                return view('likidasaun_instalasaun.reportViewLikInstall', [
                    'title' => $title,
                    'stats' => $stats,
                    'reportType' => $reportType,
                    'month' => $monthName,
                    'year' => $year,
                    'data' => $likidasauns_instalasaun
                ]);
            }
            elseif ($reportType == 'year_comparison') {
                return $this->generateYearComparisonReport($request->year, $request->comparison_year);
            }
            elseif ($reportType == 'month_comparison') {
                return $this->generateMonthComparisonReport(
                    $request->year_monthly, 
                    $request->month, 
                    $request->comparison_month
                );
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    private function generateYearComparisonReport($currentYear, $comparisonYear)
    {
        $currentData = likidasaun_instalasaun::with('metoduPagamentu')
            ->whereYear('data', $currentYear)
            ->orderBy('data')
            ->get();
            
        $comparisonData = likidasaun_instalasaun::with('metoduPagamentu')
            ->whereYear('data', $comparisonYear)
            ->orderBy('data')
            ->get();
            
        $currentTotal = $currentData->sum('montante');
        $comparisonTotal = $comparisonData->sum('montante');
        
        $difference = $currentTotal - $comparisonTotal;
        $percentageChange = $comparisonTotal != 0 ? ($difference / $comparisonTotal) * 100 : 0;
        
        $currentPaymentMethods = collect($currentData->groupBy('metodu_pagamentu_id')->map(function($items) {
            return [
                'naran' => $items->first()->metoduPagamentu->metodu_selu,
                'total' => $items->sum('montante')
            ];
        }))->values()->toArray(); 
        
        $comparisonPaymentMethods = collect($comparisonData->groupBy('metodu_pagamentu_id')->map(function($items) {
            return [
                'naran' => $items->first()->metoduPagamentu->metodu_selu,
                'total' => $items->sum('montante')
            ];
        }))->values()->toArray();

        $title = "Komparasaun Likidasaun Instalasaun Tinan $currentYear ho $comparisonYear";
        
        return view('likidasaun_instalasaun.comparisonReport', [
            'title' => $title,
            'reportType' => 'year_comparison',
            'currentYear' => $currentYear,
            'comparisonYear' => $comparisonYear,
            'currentData' => $currentData,
            'comparisonData' => $comparisonData,
            'currentTotal' => $currentTotal,
            'comparisonTotal' => $comparisonTotal,
            'difference' => $difference,
            'percentageChange' => $percentageChange,
            'currentPaymentMethods' => $currentPaymentMethods,
            'comparisonPaymentMethods' => $comparisonPaymentMethods,
        ]);
    }

    private function generateMonthComparisonReport($year, $month, $comparisonMonth)
    {
        $currentData = likidasaun_instalasaun::with('metoduPagamentu')
            ->whereYear('data', $year)
            ->whereMonth('data', $month)
            ->orderBy('data')
            ->get();
            
        $comparisonData = likidasaun_instalasaun::with('metoduPagamentu')
            ->whereYear('data', $year)
            ->whereMonth('data', $comparisonMonth)
            ->orderBy('data')
            ->get();
            
        $currentTotal = $currentData->sum('montante');
        $comparisonTotal = $comparisonData->sum('montante');
        
        $difference = $currentTotal - $comparisonTotal;
        $percentageChange = $comparisonTotal != 0 ? ($difference / $comparisonTotal) * 100 : 0;
        
        $currentPaymentMethods = $currentData->groupBy('metodu_pagamentu_id')->map(function($items) {
            return [
                'naran' => $items->first()->metoduPagamentu->metodu_selu,
                'total' => $items->sum('montante')
            ];
        });
        
        $comparisonPaymentMethods = $comparisonData->groupBy('metodu_pagamentu_id')->map(function($items) {
            return [
                'naran' => $items->first()->metoduPagamentu->metodu_selu,
                'total' => $items->sum('montante')
            ];
        });
        
        $monthName = $this->getMonth($month);
        $comparisonMonthName = $this->getMonth($comparisonMonth);
        $title = "Komparasaun Likidasaun Instalasaun Fulan $monthName ho $comparisonMonthName Tinan $year";
        
        return view('likidasaun_instalasaun.comparisonReport', [
            'title' => $title,
            'reportType' => 'month_comparison',
            'year' => $year,
            'month' => $monthName,
            'comparisonMonth' => $comparisonMonthName,
            'currentData' => $currentData,
            'comparisonData' => $comparisonData,
            'currentTotal' => $currentTotal,
            'comparisonTotal' => $comparisonTotal,
            'difference' => $difference,
            'percentageChange' => $percentageChange,
            'currentPaymentMethods' => $currentPaymentMethods,
            'comparisonPaymentMethods' => $comparisonPaymentMethods,
        ]);
    }

    private function getMonth($monthNumber)
    {
        $fulanTetum = [
            1 => 'Janeiru',
            2 => 'Fevereiru',
            3 => 'Marsu',
            4 => 'Abril',
            5 => 'Maiu',
            6 => 'Juñu',
            7 => 'Jullu',
            8 => 'Agostu',
            9 => 'Setembru',
            10 => 'Outubru',
            11 => 'Novembru',
            12 => 'Dezembru'
        ];

        return $fulanTetum[$monthNumber] ?? 'la eziste';
    }

}
