<?php

namespace App\Http\Controllers;
use App\Models\PakoteInternet;
use Illuminate\Http\Request;    

class PakoteInternetController extends Controller
{
//    form rejistu internet
    public function create()
{
    return view('PakoteInternet.rejistuInternet', [
        'title' => 'Rejistu Pakote Internet'
    ]);
}
    public function store(Request $request)
    {
        $request->validate([
            'pakote' => 'required|string|max:225',
            'presu' => 'required|numeric',
            'kapasidade' => 'required|string|max:225',
            'kustu_manutensaun' => 'required|numeric',
        ],
        [
            'pakote.required' => 'required',
            'presu.required' => 'required',
            'kapasidade.required' => 'required',
            'kustu_manutensaun'=> 'required',
            'presu.numeric' => 'prense ho numeru',
        ]
    );

        PakoteInternet::create($request->all());
        return redirect()->route('pakote.internet.dadusInternet')->with('Success','Pakote rejistu ho susesu!!!');
    }

    // hamosu dadus Internt
    public function index()
    { 
        $pakoteInternet = PakoteInternet::all();

        return view('PakoteInternet.dadusInternet', [
            'title' => 'Dadus Internet', // title
            'pakoteInternet' => $pakoteInternet //display dadus pakote ba view
        ]);
    }

    public function edit($id)
{
  
    $pakote = PakoteInternet::findOrFail($id);

    return view('PakoteInternet.edtiInternet', [
        'title' => 'Edit Pakote Internet',
        'pakote' => $pakote
    ]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'pakote' => 'required|string|max:225',
        'presu' => 'required|numeric',
        'kapasidade' => 'required|string|max:225',
        'kustu_manutensaun' =>'required|numeric',

    ]);

    $pakote = PakoteInternet::findOrFail($id);
    $pakote->update($request->all());

    return redirect()->route('pakote.internet.dadusInternet')->with('susesu', 'Update ho susesu!');
} 

public function destroy($id)
{
    $pakote = PakoteInternet::findOrFail($id);

    // Hapus data
    $pakote->delete();

    return redirect()->route('pakote.internet.dadusInternet')->with('susesu', 'Altera pakote!');
}

// public function getTotalPakote()
// {
//     $totalPakote = PakoteInternet::count();
//     $totalPresu = PakoteInternet::sum('presu');
//     $totalKapasidade = PakoteInternet::sum('kapasidade');
    
//     return response()->json([
//         'totalPakote' => $totalPakote,
//         'totalPresu' => $totalPresu,
//         'totalKapasidade' => $totalKapasidade
//     ]);
// }
// public function getAllPakote()
// {
//     $pakotes = PakoteInternet::all();
//     return response()->json($pakotes);
// }
}


