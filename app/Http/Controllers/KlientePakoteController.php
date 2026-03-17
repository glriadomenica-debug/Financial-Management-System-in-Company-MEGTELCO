<?php

namespace App\Http\Controllers;

use App\Models\Depositu;
use App\Models\Despeza;
use Illuminate\Http\Request;
use App\Models\KlientePakotes;
use App\Models\Kliente;
use App\Models\PakoteInternet;
use Illuminate\Support\Facades\DB;
use App\Models\Likidasaun;
use App\Models\likidasaun_instalasaun;
use App\Models\Tipu_Depositu;

class KlientePakoteController extends Controller
{
   
    public function index(Request $request)
{     
    $search = $request->input('search');
    
    $kp = KlientePakotes::with('kliente', 'pakote') //relasaun kliente no pakote iha tb KP
        ->when($search, function($query) use ($search) {
            return $query->where('naran', 'like', '%'.$search.'%')
                        ->orWhere('nu_ref', 'like', '%'.$search.'%')
                        ->orWhere('nu_telfone', 'like', '%'.$search.'%');
        })
        ->orderBy('created_at')
        ->get();
        
    return view('Kliente_pakote.dadusKP', compact('kp'), [
        'title' => 'Dadus Kliente : Pakote'          
    ]);
}

    public function create()
{
    $pakoteOptions = PakoteInternet::all();
    $klienteOptions = Kliente::all(); 
    return view('Kliente_pakote.rejistuKP', [
        'title' => 'Rejistu dadus Kliente : Pakote',
        'pakoteOptions' => $pakoteOptions,
        'klienteOptions' => $klienteOptions 
    ]);
}

public function getKlienteData(Request $request)
{
    $kliente = Kliente::where('nu_ref', $request->query('nu_ref'))->first();
    if ($kliente) { //fecth/foti kliente sira baseia ba "nu ref"
        return response()->json([
            'naran' => $kliente->naran,
            'data' => $kliente->data,
            'nu_telfone' => $kliente->nu_telfone,
            'residensia'=> $kliente->residensia
        ]);
    }
    return response()->json(['message' => 'Dadus mamuk'], 404);
    }
public function store(Request $request)
{
    $request->validate([
        'nu_ref' => 'required',
        'naran' => 'required',
        'data' => 'required|date',
        'nu_telfone' =>'required',
        'residensia'=> 'required',
        'pakote_id' => 'required',
        'kapasidade' => 'required',
        'presu_pakote' => 'required|numeric',
        'presu_instalasaun' => 'required|numeric',
    ]);
    $kliente = Kliente::where('nu_ref', $request->nu_ref)->first();
    if (!$kliente) {
        return back()->withErrors(['nu_ref' => 'dadus kliente laiha']);
    }
    KlientePakotes::create([
        'kliente_id' => $kliente->id,
        'pakote_id' => $request->pakote_id,
        'nu_ref' => $request->nu_ref,
        'naran' => $request->naran,
        'data' => $request->data,
        'nu_telfone'=>$request->nu_telfone,
        'residensia'=>$request->residensia,
        'kapasidade' => $request->kapasidade,
        'presu_pakote' => $request->presu_pakote,
        'presu_instalasaun' => $request->presu_instalasaun,
    ]);
    return redirect()->route('kliente_pakote.dadusKP')->with('success', 'Dadus rai ho susesu!');
}
    public function updateStatus(Request $request, $id)
    {
        $kp = KlientePakotes::findOrFail($id);
        $kp->update([
            'status' => $request->status,
            'deactivated_at' => $request->status == 'inactive' ? now() : null
        ]);
        return back()->with('success', 'Status update ho susesu');
    }
    public function edit(string $id)
    {
        $klientePakote = KlientePakotes::findOrFail($id);
        $pakoteOptions = PakoteInternet::all();
        $klienteOptions = Kliente::all();
        return view('Kliente_pakote.editKP', compact('klientePakote', 'pakoteOptions', 'klienteOptions'),
    [
        'title'=> 'Edit Kliente Pakote'
    ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'nu_ref' => 'required|exists:klientes,nu_ref',
            'naran' => 'required|string|max:255',
            // 'data' => 'required|date',
            'nu_telfone'=>'required|numeric',
            'residensia'=>'required|string|max:255',
            'pakote_id' => 'required|exists:pakote_internet,id',
            'kapasidade' => 'required|string',
            'presu_pakote' => 'required|string',
            'presu_instalasaun' => 'required|string',
        ]);
        $klientePakote = KlientePakotes::findOrFail($id);
        $klientePakote->update($request->all());
        return redirect()->route('kliente_pakote.dadusKP')->with('success', 'Dadus hadia ona!');
    }
    public function destroy(string $id)
    {
        $klientePakote = KlientePakotes::findOrFail($id);
        $klientePakote->delete();
        DB::statement('ALTER TABLE kliente_pakotes AUTO_INCREMENT = 1');
        return redirect()->route('kliente_pakote.dadusKP')->with('success', 'Data hamoos ona!');
    }

    public function getMonth($monthNumber)
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
    public function report()
    {
        $months = [
            1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
            4 => 'Abril', 5 => 'Maiu', 6 => 'Juñu',
            7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
            10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
        ];
    return view('Kliente_pakote.reportKP', [
        'title' => 'Relatoriu Kliente Pakote',
        'months'=>$months
    ]);
    }


    public function generateReport(Request $request)
{  
    $request->validate([
        'report_type' => 'required|in:annual,monthly,package_count,annual_comparison,monthly_comparison',
        'year' => 'required_if:report_type,annual|numeric',
        'month' => 'required_if:report_type,monthly|numeric|between:1,12',
        'year_monthly' => 'required_if:report_type,monthly|numeric',
        'package_year' => 'required_if:report_type,package_count|numeric',
        'package_month' => 'nullable|numeric|between:1,12',
        'start_year' => 'required_if:report_type,annual_comparison|numeric',
        'end_year' => 'required_if:report_type,annual_comparison|numeric',
        'monthly_year' => 'required_if:report_type,monthly_comparison|numeric',
    'comparison_start_month' => 'required_if:report_type,monthly_comparison|numeric|between:1,12',
    'comparison_end_month' => 'required_if:report_type,monthly_comparison|numeric|between:1,12'
    ]);

    $reportType = $request->report_type;
    $year = $request->year;
    $month = $request->month;
    $year_monthly = $request->year_monthly;
    $package_year = $request->package_year;
    $package_month = $request->package_month;

    if ($reportType == 'annual') {
                $data = KlientePakotes::with('pakote')
                    ->whereYear('data', $year)
                    ->orderBy('data')
                    ->get()
                    ->groupBy(function($item) {
                        return \Carbon\Carbon::parse($item->data)->format('F');
                    });
                    
                $title = "Relatoriu annual $year";
                $stats = [
                    'total_kliente' => $data->flatten()->count(),
                    // 'total_income' => $data->flatten()->sum('presu_pakote') + $data->flatten()->sum('presu_instalasaun'),
                    'active_kliente' => $data->flatten()->where('status', 'active')->count(),
                    'inactive_kliente' => $data->flatten()->where('status', 'inactive')->count()
                ];
        
                return view('Kliente_pakote.reportViewKP', [
                    'title' => $title,
                    'data' => $data,
                    'stats' => $stats,
                    'reportType' => $reportType
                ]);
            } 
            elseif ($reportType == 'monthly') {
                $data = KlientePakotes::with('pakote')
                    ->whereYear('data', $year_monthly)
                    ->whereMonth('data', $month)
                    ->orderBy('data')
                    ->get();             
                // $monthName = \Carbon\Carbon::create()->month($month)->monthName;
                $monthName = $this->getMonth($month);
                $title = "Relatoriu fulan $monthName {$year_monthly}";
                $stats = [
                    'total_kliente' => $data->count(),
                    // 'total_income' => $data->sum('presu_pakote') + $data->sum('presu_instalasaun'),
                    'active_kliente' => $data->where('status', 'active')->count(),
                    'inactive_kliente' => $data->where('status', 'inactive')->count()
                ];
        
                return view('Kliente_pakote.reportViewKP', [
                    'title' => $title,
                    'data' => $data,
                    'stats' => $stats,
                    'reportType' => $reportType
                ]);
            }
            elseif ($reportType == 'package_count') {
                $query = KlientePakotes::with('pakote')
                    ->select('pakote_id', DB::raw('count(*) as total'))
                    ->whereYear('data', $package_year);                
            if ($request->package_month) {
                $query->whereMonth('data', $package_month);
                // $monthName = \Carbon\Carbon::create()->month($package_month)->monthName;
                $monthName = $this->getMonth($month);
                $title = "Konta Pakote uzadu iha $monthName {$package_year}";
            } else {
                $title = "Tipu pakote uzadu iha {$package_year}";
            }            
            $popularPackages = $query->groupBy('pakote_id')
                ->orderByDesc('total')
                ->get();  
        $stats = [
            'total_kliente' => $popularPackages->sum('total'),
            'total_income' => 0,
            'active_kliente' => 0, 
            'inactive_kliente' => 0 
        ];

        return view('Kliente_pakote.reportPakote', [
            'title' => $title,
            'popularPackages' => $popularPackages,
            'stats' => $stats,
            'reportType' => $reportType
        ]);
    }
    elseif ($reportType == 'annual_comparison') {
        return $this->generateAnnualComparisonReport($request);
    }
    elseif ($reportType == 'monthly_comparison') {
        return $this->generateMonthlyComparisonReport($request);
    }
}

private function generateAnnualComparisonReport($request)
{
    $startYear = $request->start_year;
    $endYear = $request->end_year;
    
    if ($endYear < $startYear) {
        return back()->withErrors(['end_year' => 'Tinan remata tenke maior ou igual ho tinan hahu']);
    }

    $years = range($startYear, $endYear);
    $comparisonData = [];
    $packageComparison = [];

    foreach ($years as $year) {
        $data = KlientePakotes::with('pakote')
            ->whereYear('data', $year)
            ->get();

        $comparisonData[$year] = [
            'total' => $data->count(),
            'active' => $data->where('status', 'active')->count(),
            'inactive' => $data->where('status', 'inactive')->count(),
            'income' => $data->sum('presu_pakote') + $data->sum('presu_instalasaun')
        ];

        $packageData = KlientePakotes::with('pakote')
            ->select('pakote_id', DB::raw('count(*) as total'))
            ->whereYear('data', $year)
            ->groupBy('pakote_id')
            ->orderByDesc('total')
            ->get();

        $packageComparison[$year] = $packageData;
    }

    $title = "Komparasaun Kliente Pakote Hahu husi Tinan $startYear to'o $endYear";

    return view('Kliente_pakote.reportAnnual', [
        'title' => $title,
        'comparisonData' => $comparisonData,
        'packageComparison' => $packageComparison,
        'years' => $years,
        'reportType' => 'annual_comparison'
    ]);
}

private function generateMonthlyComparisonReport($request)
{
    $year = $request->monthly_year;
    $startMonth = $request->comparison_start_month;
    $endMonth = $request->comparison_end_month;
    
    if ($endMonth < $startMonth) {
        return back()->withErrors(['comparison_end_month' => 'Fulan remata tenke maior ou igual ho fulan hahu']);
    }

    $months = range($startMonth, $endMonth);
    $comparisonData = [];
    $packageComparison = [];

    foreach ($months as $month) {
        $data = KlientePakotes::with('pakote')
            ->whereYear('data', $year)
            ->whereMonth('data', $month)
            ->get();

        $monthName = $this->getMonth($month);
        
        $comparisonData[$monthName] = [
            'total' => $data->count(),
            'active' => $data->where('status', 'active')->count(),
            'inactive' => $data->where('status', 'inactive')->count(),
            // 'income' => $data->sum('presu_pakote') + $data->sum('presu_instalasaun')
        ];

        $packageData = KlientePakotes::with('pakote')
            ->select('pakote_id', DB::raw('count(*) as total'))
            ->whereYear('data', $year)
            ->whereMonth('data', $month)
            ->groupBy('pakote_id')
            ->orderByDesc('total')
            ->get();

        $packageComparison[$monthName] = $packageData;
    }

    $title = "Komparasaun Kliente Pakote iha Tinan $year - Fulan {$this->getMonth($startMonth)} to'o {$this->getMonth($endMonth)}";

    return view('Kliente_pakote.reportMonthly', [
        'title' => $title,
        'comparisonData' => $comparisonData,
        'packageComparison' => $packageComparison,
        'months' => $months,
        'monthNames' => array_map([$this, 'getMonth'], $months),
        'year' => $year,
        'reportType' => 'monthly_comparison'
    ]);
    }

    //Cards count total in Home Page
    public function getStatistics()
    {
    $totalKliente = Kliente::count(); //konta total kliente
    $totalPakoteHola = KlientePakotes::count(); //konta kliente hola pkote
    
    // total lik (by cash)
    $totalPakoteInternetCash = Likidasaun::whereYear('data_likidasaun', date('Y'))
        ->whereHas('metoduPagamentu', function($query) {
            $query->where('metodu_selu', 'like', '%Cash%');
        })
        ->sum('selu');
    
    // total lik install (by cash)
    $totalInstalasaunCash = likidasaun_instalasaun::whereYear('data', date('Y'))
        ->whereHas('metoduPagamentu', function($query) {
            $query->where('metodu_selu', 'like', '%Cash%');
        })
        ->sum('montante');

    $totalIncome = $totalPakoteInternetCash + $totalInstalasaunCash; //konta osan tama

    $totalDespeza = Despeza::whereYear('data', date('Y'))->sum('montante'); //konta total osan sai

    // Deposit account
    $bnuAccount = Tipu_Depositu::where('tipu_depositu', 'like', '%BNU%')->first();
    $bnuBalance = 0;

    $htmAccount = Tipu_Depositu::where('tipu_depositu', 'like', '%HTM%')->first();
    $htmBalance = 0;

    $brangkasAccount = Tipu_Depositu::where('tipu_depositu', 'like', '%Brangkas%')->first(); 
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
    
    // total depositu ba bnu/htm/brangkas (osan cash menus)
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
    
    // levantamentu hsi bnu/htm/brangkas (osan cash aumenta)
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
    
    // total cash (iha office)
    $totalCashIncome = $totalIncome; //  internet & instalasaun
    $totalCashOutcome = $totalDespeza; // gastus
    
    // transasaun bnu/htm/brankas
    $totalCashIncome += ($totalLevantamentoBNU + $totalLevantamentoHTM + $totalLevantamentoBrangkas); // foti
    $totalCashOutcome += ($totalDepositBNU + $totalDepositHTM + $totalDepositBrangkas); // deposit bnu/htm
    
    $totalbalansu = $totalCashIncome - $totalCashOutcome;
        
    // Top 5 pakote populár
    $topPakotes = KlientePakotes::select('pakote_id', DB::raw('count(*) as total'))
        ->groupBy('pakote_id')
        ->orderByDesc('total')
        ->limit(5)
        ->with('pakote')
        ->get();
    
        //Hamosu dadus chart iha frontend (Dashboard)
    return response()->json([
        'totalKliente' => $totalKliente,
        'totalPakoteHola' => $totalPakoteHola,
        'topPakotes' => $topPakotes,
        'totalPakoteInternet' => $totalPakoteInternetCash,
        'totalInstalasaun' => $totalInstalasaunCash,
        'totalDespeza' => $totalDespeza,
        'totalIncome' => $totalIncome,
        'totalbalansu' => $totalbalansu,
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

    public function getStatusDistribution()
    {
        $active = KlientePakotes::where('status', 'active')->count();
        $inactive = KlientePakotes::where('status', 'inactive')->count();      
        return response()->json([
            'active' => $active,
            'inactive' => $inactive
        ]);
    }

}
