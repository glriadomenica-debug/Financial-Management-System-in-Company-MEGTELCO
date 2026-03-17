<?php

namespace App\Http\Controllers;

use App\Models\MetoduPagamentu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetoduPagamentuController extends Controller
{
   
    public function index()
    {
        $metodupagamentus = MetoduPagamentu::all();
        return view('metodupagamento.daduspagamentu',compact('metodupagamentus'),[
            'title'=> 'Metodu Pagamentu'
        ]);
    }
   
    public function create()
    {
        return view('metodupagamento.aumentadaduspagamentu',[
            'title'=>'Rejistu Metodu Pagamentu'
        ]);
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'metodu_selu'=> 'required|string|max:255|unique:metodu_pagamentus,metodu_selu'
        ]);

        MetoduPagamentu::create([
            'metodu_selu' => $request->metodu_selu
        ]);

        return redirect()->route('metodupagamento.daduspagamentu')->with('susesu','Metodu Pagamentu rejistu ho susesu!');
        
    }
   
    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        
    }

  
    public function update(Request $request, string $id)
    {
        
    }

 
    public function destroy($id)
    {
        MetoduPagamentu::findOrFail($id)->delete();
        DB::statement('ALTER TABLE metodu_pagamentus AUTO_INCREMENT = 1');

        return redirect()->route('metodupagamento.daduspagamentu')->with('susesu','Metodu pagamentu hamoos ona!');
        
    }

}
