<?php

namespace App\Http\Controllers;

use App\Models\Depositu;
use App\Models\Despeza;
use App\Models\Likidasaun;
use App\Models\likidasaun_instalasaun;
use App\Models\Tipu_Depositu;
use App\Models\tiputransaksaun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DespezaController extends Controller
{
        public function index()
    {
        $despezas = Despeza::with('tipuTransaksaun')->get();
        
        $likInternet = Likidasaun::whereYear('data_likidasaun', date('Y'))
        ->whereHas('metoduPagamentu', function($query) {
            $query->where('metodu_selu', 'like', '%Cash%');
        })
        ->sum('selu');

        $likInstall = likidasaun_instalasaun::whereYear('data', date('Y'))
        ->whereHas('metoduPagamentu', function($query) {
            $query->where('metodu_selu', 'like', '%Cash%');
        })
        ->sum('montante');

    // Deposit account
    $bnuAccount = Tipu_Depositu::where('tipu_depositu', 'like', '%BNU%')->first();
    $htmAccount = Tipu_Depositu::where('tipu_depositu', 'like', '%HTM%')->first();
    $brangkasAccount = Tipu_Depositu::where('tipu_depositu', 'like', '%Brangkas%')->first();
    
    $bnuBalance = 0;
    $htmBalance = 0;
    $brangkasBalance = 0;
    
    if ($bnuAccount) {
        $bnuBalance = Depositu::whereYear('data_depositu', date('Y'))
            ->where('tipu_depositu_ba_id', $bnuAccount->id)
            ->sum('montante') - 
            Depositu::whereYear('data_depositu', date('Y'))
            ->where('tipu_depositu_husi_id', $bnuAccount->id)
            ->sum('montante');
    }
    
    if ($htmAccount) {
        $htmBalance = Depositu::whereYear('data_depositu', date('Y'))
            ->where('tipu_depositu_ba_id', $htmAccount->id)
            ->sum('montante') - 
            Depositu::whereYear('data_depositu', date('Y'))
            ->where('tipu_depositu_husi_id', $htmAccount->id)
            ->sum('montante');
    }
    if ($brangkasAccount) {
        $brangkasBalance = Depositu::whereYear('data_depositu', date('Y'))
            ->where('tipu_depositu_ba_id', $brangkasAccount->id)
            ->sum('montante') - 
            Depositu::whereYear('data_depositu', date('Y'))
            ->where('tipu_depositu_husi_id', $brangkasAccount->id)
            ->sum('montante');
    }
    
    // total depositu ba bnu/htm(osan cash menus)
    $totalDepositBNU = Depositu::whereYear('data_depositu', date('Y'))
        ->whereHas('tipu_depositu_husi', function($query) {
            $query->where('tipu_depositu', 'like', '%Cash%'); 
        })
        ->where('tipu_depositu_ba_id', $bnuAccount->id)
        ->sum('montante');
    
    $totalDepositHTM = Depositu::whereYear('data_depositu', date('Y'))
        ->whereHas('tipu_depositu_husi', function($query) {
            $query->where('tipu_depositu', 'like', '%Cash%');
        })
        ->where('tipu_depositu_ba_id', $htmAccount->id)
        ->sum('montante');

    $totalDepositBrangkas = Depositu::whereYear('data_depositu', date('Y'))
        ->whereHas('tipu_depositu_husi', function($query) {
            $query->where('tipu_depositu', 'like', '%Cash%');
        })
        ->where('tipu_depositu_ba_id', $brangkasAccount->id)
        ->sum('montante');
    
    // levantamentu hsi bnu/htm (osan cash aumenta)
    $totalLevantamentoBNU = Depositu::whereYear('data_depositu', date('Y'))
        ->where('tipu_depositu_husi_id', $bnuAccount->id)
        ->where('levantamento', true)
        ->sum('montante');
    
    $totalLevantamentoHTM = Depositu::whereYear('data_depositu', date('Y'))
        ->where('tipu_depositu_husi_id', $htmAccount->id)
        ->where('levantamento', true)
        ->sum('montante');

    $totalLevantamentoBrangkas = Depositu::whereYear('data_depositu', date('Y'))
        ->where('tipu_depositu_husi_id', $brangkasAccount->id)
        ->where('levantamento', true)
        ->sum('montante');

        $OsanTama = $likInternet + $likInstall + $totalLevantamentoBNU +$totalLevantamentoBrangkas+ $totalLevantamentoHTM;
        $OsanSai = $totalDepositBNU + $totalDepositBrangkas + $totalDepositHTM;
        $totalOsanTama = $OsanTama - $OsanSai;

        return view('Despeza.dadusDespeza', [
            'title' => 'Dadus Despeza',
            'despezas'=>$despezas,
            'totalOsanTama'=>$totalOsanTama,
            'totalDepositBNU' => $totalDepositBNU,
            'totalDepositHTM' => $totalDepositHTM,
            'totalDepositBrangkas' => $totalDepositBrangkas,
            'totalLevantamentoBNU' => $totalLevantamentoBNU,
            'totalLevantamentoHTM' => $totalLevantamentoHTM,
            'totalLevantamentoBrangkas' => $totalLevantamentoBrangkas,
            'bnuBalance' => $bnuBalance,
            'htmBalance' => $htmBalance,
            'brangkasBalance' => $brangkasBalance
                
        ]);

    }

    public function create()
    {
        $tiputransaksauns= tiputransaksaun::all();
        return view('despeza.aumentaDespeza', compact('tiputransaksauns'),[
            'title'=> 'Aumenta dadus Despeza'
        ]);
    }
    
    public function show()
{
    $despezas = Despeza::with('tipuTransaksaun')->get();
    return view('Despeza.dadusDespeza', compact('despezas'),[
        'title'=>'Dadus Despeza'
    ]);
}
    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'tiputransaksaun_id' => 'required|exists:tiputransaksauns,id',
            'montante' => 'required|numeric|'
        ]);

        Despeza::create([
            'data' => $request->data,
            'tiputransaksaun_id' => $request->tiputransaksaun_id,
            'montante' => $request->montante,
        ]);

        return redirect()->route('despeza.dadusDespeza')->with('susesu', 'Dadus despeza aumenta ho susesu.');
    }

    //  form edit 
    public function edit($id)
    {
        $despeza = Despeza::findOrFail($id);
        return view('despeza.editDespeza', compact('despeza'),[
            'title'=>'Edit dadus despeza'
        ]);
    }

    // Update dadus Despeza
    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'required|date',
            'tipu_transasaun' => 'required|string|max:255',
            'montante' => 'required|numeric|min:0'
        ]);

        $despeza = Despeza::findOrFail($id);
        $despeza->update([
            'data' => $request->data,
            'tipu_transasaun' => $request->tipu_transasaun,
            'montante' => $request->montante
        ]);

        return redirect()->route('despeza.dadusDespeza')->with('susesu', 'Dadus Despeza rai ona!!.');
    }

        public function destroy($id)
    {
        Despeza::findOrFail($id)->delete();

        // Reset AUTO_INCREMENT 
        DB::statement('ALTER TABLE despezas AUTO_INCREMENT = 1');

        return redirect()->route('despeza.index')->with('success', 'Dadus Despeza hamoos ho susesu!');
    }

    public function report()
    {
        $months = [
            1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
            4 => 'Abril', 5 => 'Maiu', 6 => 'Juñu',
            7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
            10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
        ];
    return view('despeza.reportDespeza', [
        'title' => 'Relatoriu Despeza',
        'months'=>$months
    ]);
    }


public function generateReport(Request $request)
{
    $request->validate([
        'report_type' => 'required|in:annual,monthly,expense_type',
        'year' => 'required_if:report_type,annual,expense_type|nullable|numeric',
        'month' => 'required_if:report_type,monthly|nullable|numeric|between:1,12',
        'year_monthly' => 'required_if:report_type,monthly|nullable|numeric',
    ]);

    $reportType = $request->report_type;
    $totalOsanTama = Likidasaun::sum('selu') + likidasaun_instalasaun::sum('montante');
    
    //Kondisaun ba tipu relatoriu (Conditional Statement)
    try {
        if ($reportType == 'annual') {
            $year = $request->year;
            $expenses = Despeza::with('tipuTransaksaun')
                ->whereYear('data', $year)
                ->orderBy('data')
                ->get();
            $expenseTypes = $expenses->groupBy('tiputransaksaun_id')->map(function($items) {
                return [
                    'name' => $items->first()->tipuTransaksaun->tipu_transaksaun,
                    'total' => $items->sum('montante'),
                    'count' => $items->count()
                ];
            });
        
            $title = "Relatoriu Despeza Annual $year";
            
            $stats = [
                'total_despeza' => $expenses->sum('montante'),
                'total_transactions' => $expenses->count(),
                'total_osan_tama' => $totalOsanTama,
                'balansu' => $totalOsanTama - $expenses->sum('montante')
            ];
        
            return view('despeza.reportViewDespeza', [
                'title' => $title,
                'expenseTypes' => $expenseTypes,
                'stats' => $stats,
                'reportType' => $reportType,
                'year' => $year,
                'totalOsanTama' => $totalOsanTama
            ]);
          
        } elseif ($reportType == 'monthly') {
            $year = $request->year_monthly;
            $month = $request->month;
            
            $data = Despeza::with('tipuTransaksaun')
                ->whereYear('data', $year)
                ->whereMonth('data', $month)
                ->orderBy('data')
                ->get();

            $monthName = $this->getMonth($month);
            $title = "Relatoriu Despeza Fulan $monthName $year";
            
            $stats = [
                'total_despeza' => $data->sum('montante'),
                'total_transactions' => $data->count(),
                'total_osan_tama' => $totalOsanTama,
                'balansu' => $totalOsanTama - $data->sum('montante')
            ];

            return view('despeza.reportViewDespeza', [
                'title' => $title,
                'data' => $data,
                'stats' => $stats,
                'reportType' => $reportType,
                'year' => $year,
                'month' => $month,
                'totalOsanTama' => $totalOsanTama
            ]);
            
        } elseif ($reportType == 'expense_type') {
            $year = $request->year;
            
            $expenseTypes = Despeza::with('tipuTransaksaun')
                ->select('tiputransaksaun_id', DB::raw('sum(montante) as total'))
                ->whereYear('data', $year)
                ->groupBy('tiputransaksaun_id')
                ->orderByDesc('total')
                ->get();

            $totalExpense = $expenseTypes->sum('total');
            $title = "Tipu Despeza iha Tinan $year";

            return view('despeza.reportExpenseType', compact('title', 'expenseTypes', 'totalExpense', 'reportType'));
        }
        
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
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