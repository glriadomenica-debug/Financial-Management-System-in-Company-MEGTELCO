<?php

namespace App\Http\Controllers;

use App\Models\Kliente;
use Illuminate\Http\Request;
use App\Models\PakoteInternet; //Import model husi PakoteInternet
use Illuminate\Support\Facades\DB;

class KlienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
         $daduskliente = Kliente::all();
        // $daduskliente = Kliente::with('pakote')->get();
        return view('Kliente.daduskliente',compact('daduskliente'),[
            'title'=> 'Dadus Kliente',
            
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakoteOptions= PakoteInternet::all();

        return view('Kliente.rejistukliente', [
            'title' => 'Rejistu dadus Kliente',
            'pakoteOptions'=> $pakoteOptions
        ]);
    }
    public function show()
    {
         $daduskliente = Kliente::all();
        // $daduskliente = Kliente::with('pakote')->get();
        return view('Kliente.rejistukliente',compact('daduskliente'),[
            'title'=> 'Dadus Kliente'
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nu_ref' => 'required|unique:klientes,nu_ref',
            'data' => 'required|date',
            'naran' => 'required|string|max:255',
            'idcard_passport'=> 'required|string',
            'nationality'=> 'required|string',
            'residensia' => 'required|string',
            'nu_telfone' => 'nullable|numeric',
            // 'profisaun' => 'required|string',
            'kategoria' => 'required|in:privadu,publiku',
            'email' => 'nullable|email',
            // 'pakote_id' => 'required|exists:pakote_internet,id',
            // 'kapasidade' => 'required|string',
            // 'presu_pakote' => 'required|numeric',
            // 'presu_instalasaun' => 'required|numeric'
        ]);

        if ($request->kategoria == 'privadu') {
            $rules['profisaun'] = 'required|string';
        }
    
        $request->validate($rules);
    
        $kliente = Kliente::create([
            'nu_ref' => $request->nu_ref,
            'data' => $request->data,
            'naran' => $request->naran,
            'idcard_passport' => $request->idcard_passport,
            'nationality' => $request->nationality,
            'residensia' => $request->residensia,
            'nu_telfone' => $request->nu_telfone,
            'profisaun' => $request->profisaun,
            'kategoria' => $request->kategoria,
            'email' => $request->email,
            // 'pakote_id' => $request->pakote_id,
            // 'kapasidade' => $request->kapasidade,
            // 'presu_pakote' => $request->presu_pakote,
            // 'presu_instalasaun' => $request->presu_instalasaun,
        ]);

        // dd($kliente); 
        // Kliente::create($request->all());
        return redirect()->route('kliente.daduskliente')->with('success', 'Dadus kliente rejistu ho susesu!');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kliente = Kliente::findOrFail($id);
        $pakoteOptions = PakoteInternet::all(); 

        return view('Kliente.editKliente', [
            'title'=> 'Edit Dadus Kliente',
            'kliente'=>$kliente,
            'pakoteOptions'=>$pakoteOptions
        ]);

        return view('kliente.edit', compact('kliente', 'pakoteOptions'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kliente = Kliente::findOrFail($id);
        
        $request->validate([
            // 'nu_ref' => 'required|unique:klientes,nu_ref,'.$kliente->id,
            // 'data' => 'required|date',
            'naran' => 'required|string|max:255',
            'idcard_passport' => 'required|string',
            'nationality' => 'required|string',
            'residensia' => 'required|string',
            'nu_telfone' => 'nullable|numeric',
            'kategoria' => 'required|in:privadu,publiku',
            // 'profisaun' => 'required|string',
            'email' => 'nullable|email',
            // 'pakote_id' => 'required|exists:pakote_internet,id',
            // 'kapasidade' => 'required|string',
            // 'presu_pakote' => 'required|numeric',
            // 'presu_instalasaun' => 'required|numeric',

        ]);
        if ($request->kategoria == 'privadu') {
            $rules['profisaun'] = 'required|string';
        }
        
    $request->validate($rules);

        // $kliente =Kliente::findOrFail($id);
        // $kliente->update($request->all());
        $kliente->update([
            'naran' => $request->naran,
            'idcard_passport' => $request->idcard_passport,
            'nationality' => $request->nationality,
            'residensia' => $request->residensia,
            'nu_telfone' => $request->nu_telfone,
            'profisaun' => $request->profisaun,
            'kategoria' => $request->kategoria,
            'email' => $request->email,
            // 'pakote_id' => $request->pakote_id, 
            // 'kapasidade' => $request->kapasidade,
            // 'presu_pakote' => $request->presu_pakote,
            // 'presu_instalasaun' => $request->presu_instalasaun,
        ]);
        

        return redirect()->route('kliente.daduskliente')->with('susesu','update ho susesu!!');
       
    }

    public function destroy($id)
    {
    $kliente = Kliente::findOrFail($id);
    // delte data
    $kliente->delete();

    DB::statement('ALTER TABLE klientes AUTO_INCREMENT = 1');

    return redirect()->route('kliente.daduskliente')->with('susesu', 'Altera dadus kliente!');
}


public function report()
{
    $months = [
        1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
        4 => 'Abril', 5 => 'Maiu', 6 => 'Juñu',
        7 => 'Jullu', 8 => 'Agostu', 9 => 'Setembru',
        10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
    ];
   
    return view('Kliente.reportkliente', [
        'title' => 'Relatoriu Kliente',
        'months'=>$months
    ]);
}

public function generateReport(Request $request)
{
    $request->validate([
        'report_type' => 'required|in:annual,monthly',
        'year' => 'required_if:report_type,annual|numeric',
        'month' => 'required_if:report_type,monthly|numeric|between:1,12',
        'year_monthly' => 'required_if:report_type,monthly|numeric'
    ]);

    $reportType = $request->report_type;
    $year = $request->year;
    $month = $request->month;
    $yearMonthly = $request->year_monthly;

    if ($reportType == 'annual') {
        $data = Kliente::whereYear('data', $year)
            ->orderBy('data')
            ->get()
            ->groupBy(function($item) {
                return \Carbon\Carbon::parse($item->data)->format('F');
            });

        $newClients = Kliente::whereYear('data', $year)->count();
        
        $title = "Relatoriu dadus kliente annual $year";
    } else {
        $data = Kliente::whereYear('data', $yearMonthly)
            ->whereMonth('data', $month)
            ->orderBy('data')
            ->get();

        $newClients = Kliente::whereYear('data', $yearMonthly)
            ->whereMonth('data', $month)
            ->count();
            
        $monthName = $this->getMonth($month);
        $title = "Relatoriu dadus kliente fulan $monthName $yearMonthly";
    }
    $totalPrivadu = $data->flatten()->where('kategoria', 'privadu')->count();
    $totalPubliku = $data->flatten()->where('kategoria', 'publiku')->count();

    $stats = [
        'total_kliente' => Kliente::count(), 
        'new_this_period' => $newClients, // sura total kliente foun bazeia ba fulan ou Tinan selesionadu
        'with_email' => $data->flatten()->whereNotNull('email')->count(),
        'without_email' => $data->flatten()->whereNull('email')->count(),
        'total_timorense' => $data->flatten()->where('nationality', 'Timorense')->count(),
        'total_estrangeiro' => $data->flatten()->where('nationality', '!=', 'Timorense')->count(),
        'total_privadu' => $totalPrivadu,
        'total_publiku' => $totalPubliku
    ];
      
        // if ($reportType == 'monthly') {
        //     $previousMonth = $month - 1 < 1 ? 12 : $month - 1;
        //     $previousMonthName = $this->getMonth($previousMonth);
        // } else {
        //     $previousMonthName = null;
        // }
        
    return view('Kliente.reportViewKliente', [
    'title' => $title,
    'data' => $data,
    'stats' => $stats,
    'reportType' => $reportType,
    // 'previousMonthName' => $previousMonthName,
    'year' => $reportType == 'annual' ? $year : $yearMonthly,
    'month' => $month
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



    

