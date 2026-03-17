<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Likidasaun;
use App\Models\Invoice;
use App\Models\MetoduPagamentu;
use Illuminate\Support\Facades\DB;

class LikidasaunController extends Controller
{
   public function index()
    {
        $likidasauns = Likidasaun::with('invoices','metoduPagamentu')->get(); 
        return view('likidasaun.dadusLikidasaun', compact('likidasauns'),[
            'title'=>'Dadus Selu Pakote Internet'
        ]);  
    }

    public function create()
    {
        $invoices = Invoice::whereNotIn('id', function($query)  //whereNotIn (klausa) -- invoice nebe seidauk selu
        { 
        $query->select('invoice_id')->from('likidasauns'); //Buka id invoice seidauk halo Lik
        })
        ->get();
        
        $metodu_pagamentus = MetoduPagamentu::all(); 
        return view('likidasaun.aumentaLikidasaun', compact('invoices','metodu_pagamentus'),[
            'title'=>'Aumenta dadus selu pakote internet'
        ]);
    }

    public function getInvoiceData($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $monthName = \Carbon\Carbon::create()->month($invoice->period_month)->translatedFormat('F');
        $year = $invoice->period_year;
        $deskrisaun = "Fornesimentu Servisu Internet fulan $monthName tinan $year";
        //fo dadus ba frontend (AJAX)
        return response()->json([
            'deskrisaun' => $deskrisaun,
            'montante' => $invoice->total,
            'naran' => $invoice->naran 
        ]);
    }   

    public function store(Request $request)
    {
            $request->validate([
            // 'naran'=>'required|string|max:255',
            'data_likidasaun' => 'required|date',
            'invoice_id' => 'required|exists:invoices,id',
            'deskrisaun' => 'required|string|max:255',
            'metodu_pagamentu_id' => 'required|exists:metodu_pagamentus,id',
            'selu'=>'required|numeric',
            // 'tipu_transaksaun'=>'required|string|max:255',
            'montante' => 'required|numeric',          
        ]);

        $invoice = Invoice::findOrFail($request->invoice_id);
        $naran = $invoice->naran;

        Likidasaun::create([
            'naran'=>$naran,
            'data_likidasaun' => $request->data_likidasaun,
            'invoice_id' => $request->input('invoice_id'),
            'deskrisaun' => $request->deskrisaun,
            'metodu_pagamentu_id' => $request->metodu_pagamentu_id,
            'selu'=>$request->selu,
            // 'tipu_transaksaun'=>$request->tipu_transaksaun,
            'montante' => $request->montante,           
        ]);
        return redirect()->route('likidasaun.dadusLikidasaun')->with('susesu', 'Dadus rai ona!');
    }

    public function edit($id)
    {
        $likidasaun = Likidasaun::findOrFail($id);
        $invoices = Invoice::findOrFail($likidasaun->invoice_id);
        
         // $invoices = Invoice::whereNotIn('id', function($query) use ($id) {
        //         $query->select('invoice_id')
        //             ->from('likidasauns')
        //             ->where('id', '!=', $id);
        //     })
        //     ->orWhere('id', $likidasaun->invoice_id)
        //     ->get();

        $metodu_pagamentus = MetoduPagamentu::all();

        return view('likidasaun.editLikidasaun', compact('likidasaun', 'invoices','metodu_pagamentus'),[
            'title'=>'Edit dadus '
        ]); 
    }
    public function update(Request $request, $id)
    {
    $request->validate([
        // 'naran'=>'required|string|',
        'data_likidasaun' => 'required|date',
        'invoice_id' => 'required|exists:invoices,id',
        'deskrisaun' => 'required|string',
        'metodu_pagamentu_id' => 'required|exists:metodu_pagamentus,id',
        'selu'=>'required|numeric',
        // 'tipu_transaksaun'=>'required|string',
        'montante' => 'required|numeric',        
    ]);
    $invoice = Invoice::findOrFail($request->invoice_id);
    $naran = $invoice->naran;

    $likidasaun = Likidasaun::findOrFail($id);
    $likidasaun->update([
        'naran'=>$naran,
        'data_likidasaun' => $request->data_likidasaun,
        'invoice_id' => $request->invoice_id,
        'deskrisaun' => $request->deskrisaun,
        'metodu_pagamentu_id' => $request->metodu_pagamentu_id,
        'selu'=>$request->selu,
        // 'tipu_transaksaun'=>$request->tipu_transaksaun,
        'montante' => $request->montante,        
    ]);
    // return redirect()->route('likidasaun.dadusLikidasaun')->with('success', 'Dadus likidasaun update ho susesu!');
    return redirect()->route('likidasaun.dadusLikidasaun');
    }

    public function destroy($id)
    {
        $likidasaun = Likidasaun::findOrFail($id);
        $likidasaun->delete();

        DB::statement('ALTER TABLE likidasauns AUTO_INCREMENT = 1');

        return redirect()->route('likidasaun.dadusLikidasaun')->with('susesu', 'Dadus hamoos ona.');
    }

    public function report()
    {
        $months = [
            1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
            4 => 'Abril', 5 => 'Maiu', 6 => 'Juñu',
            7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
            10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
        ];
    return view('likidasaun.reportLik', [
        'title' => 'Relatoriu Likidasaun Pakote Internet',
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
//             $likidasauns = Likidasaun::with('metoduPagamentu')
//                 ->whereYear('data_likidasaun', $year)
//                 ->orderBy('data_likidasaun')
//                 ->get();
//                 $totalMontante = $likidasauns->sum('montante');
//             $paymentMethods = $likidasauns->groupBy('metodu_pagamentu_id')->map(function($items) {
//                 return [
//                     'naran' => $items->first()->metoduPagamentu->metodu_selu, 
//                     'total' => $items->sum('selu')
//                     // 'count' => $items->count()
//                 ];
                
//             });
            
//             $title = "Relatoriu Likidasaun Pakote Internet Tinan $year";
            
//             $stats = [
//                 'total_likidasaun' => $likidasauns->sum('selu'),
//                 'total_transactions' => $likidasauns->count(),
//                 'total_montante' => $totalMontante,
//                 'payment_methods' => $paymentMethods
//             ];
        
//             return view('likidasaun.reportViewLik', [
//                 'title' => $title,
//                 'stats' => $stats,
//                 'reportType' => $reportType,
//                 'year' => $year,
//                 'data' => $likidasauns
//             ]);
          
//         } elseif ($reportType == 'monthly') {
//             $year = $request->year_monthly;
//             $month = $request->month;
//             $likidasauns = Likidasaun::with('metoduPagamentu')
//                 ->whereYear('data_likidasaun', $year)
//                 ->whereMonth('data_likidasaun', $month)
//                 ->orderBy('data_likidasaun')
//                 ->get();
//                 $totalMontante = $likidasauns->sum('montante');
//             $paymentMethods = $likidasauns->groupBy('metodu_pagamentu_id')->map(function($items) {
//                 return [
//                     'naran' => $items->first()->metoduPagamentu->metodu_selu,
//                     'total' => $items->sum('selu')
//                     // 'count' => $items->count()
//                 ];
//             });

//             $monthName = $this->getMonth($month);
//             $title = "Relatoriu Likidasaun Pakote Internet Fulan $monthName $year";
            
//             $stats = [
//                 'total_likidasaun' => $likidasauns->sum('selu'),
//                 'total_transactions' => $likidasauns->count(),
//                 'total_montante' => $totalMontante,
//                 'payment_methods' => $paymentMethods
//             ];

//             return view('likidasaun.reportViewLik', [
//                 'title' => $title,
//                 'stats' => $stats,
//                 'reportType' => $reportType,
//                 'month' => $monthName,
//                 'year' => $year,
//                 'data' => $likidasauns
//             ]);
//         }
        
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
//     }
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
            $likidasauns = Likidasaun::with('metoduPagamentu')
                ->whereYear('data_likidasaun', $year)
                ->orderBy('data_likidasaun')
                ->get();
            $totalMontante = $likidasauns->sum('montante');
            $paymentMethods = $likidasauns->groupBy('metodu_pagamentu_id')->map(function($items) {
                return [
                    'naran' => $items->first()->metoduPagamentu->metodu_selu, 
                    'total' => $items->sum('selu')
                    // 'count' => $items->count()
                ];
                
            });
            
            $title = "Relatoriu Likidasaun Pakote Internet Tinan $year";
            
            $stats = [
                'total_likidasaun' => $likidasauns->sum('selu'),
                'total_transactions' => $likidasauns->count(),
                'total_montante' => $totalMontante,
                'payment_methods' => $paymentMethods
            ];
        
            return view('likidasaun.reportViewLik', [
                'title' => $title,
                'stats' => $stats,
                'reportType' => $reportType,
                'year' => $year,
                'data' => $likidasauns
            ]);
        }

elseif ($reportType == 'monthly') {
            $year = $request->year_monthly;
            $month = $request->month;
            $likidasauns = Likidasaun::with('metoduPagamentu')
                ->whereYear('data_likidasaun', $year)
                ->whereMonth('data_likidasaun', $month)
                ->orderBy('data_likidasaun')
                ->get();
            $totalMontante = $likidasauns->sum('montante');
            $paymentMethods = $likidasauns->groupBy('metodu_pagamentu_id')->map(function($items) {
                return [
                    'naran' => $items->first()->metoduPagamentu->metodu_selu,
                    'total' => $items->sum('selu')
                    // 'count' => $items->count()
                ];
            });

            $monthName = $this->getMonth($month);
            $title = "Relatoriu Likidasaun Pakote Internet Fulan $monthName $year";
            
            $stats = [
                'total_likidasaun' => $likidasauns->sum('selu'),
                'total_transactions' => $likidasauns->count(),
                'total_montante' => $totalMontante,
                'payment_methods' => $paymentMethods
            ];

            return view('likidasaun.reportViewLik', [
                'title' => $title,
                'stats' => $stats,
                'reportType' => $reportType,
                'month' => $monthName,
                'year' => $year,
                'data' => $likidasauns
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
    $currentData = Likidasaun::with('metoduPagamentu')
        ->whereYear('data_likidasaun', $currentYear)
        ->orderBy('data_likidasaun')
        ->get();
        
    $comparisonData = Likidasaun::with('metoduPagamentu')
        ->whereYear('data_likidasaun', $comparisonYear)
        ->orderBy('data_likidasaun')
        ->get();
        
    $currentTotal = $currentData->sum('selu');
    $comparisonTotal = $comparisonData->sum('selu');
    
    // $difference = $currentTotal - $comparisonTotal;
    // $percentageChange = $comparisonTotal != 0 ? ($difference / $comparisonTotal) * 100 : 0;
    
      $currentPaymentMethods = collect($currentData->groupBy('metodu_pagamentu_id')->map(function($items) {
        return [
            'naran' => $items->first()->metoduPagamentu->metodu_selu,
            'total' => $items->sum('selu')
        ];
    })->values()->toArray()); 
    
      $comparisonPaymentMethods = collect($comparisonData->groupBy('metodu_pagamentu_id')->map(function($items) {
        return [
            'naran' => $items->first()->metoduPagamentu->metodu_selu,
            'total' => $items->sum('selu')
        ];
    })->values()->toArray()); 

    $title = "Komparasaun Likidasaun Pakote Internet Tinan $currentYear ho $comparisonYear";
    
    return view('likidasaun.comparisonReport', [
        'title' => $title,
        'reportType' => 'year_comparison',
        'currentYear' => $currentYear,
        'comparisonYear' => $comparisonYear,
        'currentData' => $currentData,
        'comparisonData' => $comparisonData,
        'currentTotal' => $currentTotal,
        'comparisonTotal' => $comparisonTotal,
        // 'difference' => $difference,
        // 'percentageChange' => $percentageChange,
        'currentPaymentMethods' => $currentPaymentMethods,
        'comparisonPaymentMethods' => $comparisonPaymentMethods,
    ]);
}

private function generateMonthComparisonReport($year, $month, $comparisonMonth)
{
    $currentData = Likidasaun::with('metoduPagamentu')
        ->whereYear('data_likidasaun', $year)
        ->whereMonth('data_likidasaun', $month)
        ->orderBy('data_likidasaun')
        ->get();
        
    $comparisonData = Likidasaun::with('metoduPagamentu')
        ->whereYear('data_likidasaun', $year)
        ->whereMonth('data_likidasaun', $comparisonMonth)
        ->orderBy('data_likidasaun')
        ->get();
        
    $currentTotal = $currentData->sum('selu');
    $comparisonTotal = $comparisonData->sum('selu');
    
    // $difference = $currentTotal - $comparisonTotal;
    // $percentageChange = $comparisonTotal != 0 ? ($difference / $comparisonTotal) * 100 : 0;
    
    $currentPaymentMethods = $currentData->groupBy('metodu_pagamentu_id')->map(function($items) {
        return [
            'naran' => $items->first()->metoduPagamentu->metodu_selu,
            'total' => $items->sum('selu')
        ];
    });
    
    
    $comparisonPaymentMethods = $comparisonData->groupBy('metodu_pagamentu_id')->map(function($items) {
        return [
            'naran' => $items->first()->metoduPagamentu->metodu_selu,
            'total' => $items->sum('selu')
        ];
    });
    
    $monthName = $this->getMonth($month);
    $comparisonMonthName = $this->getMonth($comparisonMonth);
    $title = "Komparasaun Likidasaun Pakote Internet Fulan $monthName ho $comparisonMonthName Tinan $year";
    
    return view('likidasaun.comparisonReport', [
        'title' => $title,
        'reportType' => 'month_comparison',
        'year' => $year,
        'month' => $monthName,
        'comparisonMonth' => $comparisonMonthName,
        'currentData' => $currentData,
        'comparisonData' => $comparisonData,
        'currentTotal' => $currentTotal,
        'comparisonTotal' => $comparisonTotal,
        // 'difference' => $difference,
        // 'percentageChange' => $percentageChange,
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
