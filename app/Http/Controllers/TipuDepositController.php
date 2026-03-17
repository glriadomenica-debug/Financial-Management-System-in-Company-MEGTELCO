<?php

namespace App\Http\Controllers;

use App\Models\Tipu_Depositu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipuDepositController extends Controller
{
    public function index()
    {
        $tipuDeps = Tipu_Depositu::all();
        return view('tipu_deposit.dadusDep',compact('tipuDeps'),[
            'title'=> 'Dadus Tipu Depositu'
        ]);
    }

    public function create()
    {
        return view('tipu_deposit.rejistuDep',[
            'title'=>'Rejistu Tipu Depositu'
        ]);
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipu_depositu'=> 'required|string|max:255|unique:tipu__depositus,tipu_depositu'
        ]);

        Tipu_Depositu::create([
            'tipu_depositu' => $request->tipu_depositu
        ]);

        return redirect()->route('tipu_deposit.dadusDep')->with('susesu','Tipu depositu rejistu ho susesu!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
 

    public function destroy($id)
    {
        Tipu_Depositu::findOrFail($id)->delete();
        DB::statement('ALTER TABLE tipu__depositus AUTO_INCREMENT = 1');

        return redirect()->route('tipu_deposit.dadusDep')->with('susesu','Tipu depositu hamoos ona!');
        
    }
}

