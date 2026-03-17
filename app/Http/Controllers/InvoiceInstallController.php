<?php

namespace App\Http\Controllers;

use App\Models\InvoiceInstall;
use Illuminate\Http\Request;
use App\Models\KlientePakotes;

class InvoiceInstallController extends Controller
{
   public function index()
    {
        // $dadusinvoice =  Kliente::select('nu_ref', 'naran', 'pakote_id')->with('pakote')->get();

        $dadusinstall = KlientePakotes::with(['pakote','kliente','invoicesInstalls'])->get();
        return view('invoiceinstalls.dadusInstall',compact('dadusinstall'),[
            'title'=>'Lista Invoice Instalasaun'
        ]);
    }

    public function create()
    {
        //
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'nu_ref' => 'required|string|unique:invoice_installs,nu_ref',
        'data_faktura' => 'required|date',
        'data_limite_pagamentu' => 'required|date|after:data_faktura',
        'naran' => 'required|string|max:255',
        'residensia' => 'required|string|max:255',
        'nu_telfone' => 'required|string|max:255',
        'subtotal' => 'required|numeric|min:0',
        'tax' => 'required|numeric|min:0',
        'maintenance' => 'required|numeric|min:0',
        'total' => 'required|numeric|min:0',
        'kliente_pakotes_id' => 'required|exists:kliente_pakotes,id',
        'deskrisaun' => 'nullable|json'
    ]);

    $klientePakote = KlientePakotes::findOrFail($validated['kliente_pakotes_id']);

    $invoiceInstall = InvoiceInstall::create([
        'nu_ref' => $validated['nu_ref'],
        'data_faktura' => $validated['data_faktura'],
        'data_limite_pagamentu' => $validated['data_limite_pagamentu'],
        'naran' => $validated['naran'],
        'residensia' => $validated['residensia'],
        'nu_telfone' => $validated['nu_telfone'],
        'subtotal' => $validated['subtotal'],
        'tax' => $validated['tax'],
        'maintenance' => $validated['maintenance'],
        'total' => $validated['total'],
        'deskrisaun' => $validated['deskrisaun'] ?? null,
        'kliente_pakotes_id' => $klientePakote->id,
        'is_printed' => true,
        'period_month' => now()->month, 
        'period_year' => now()->year, 
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Invoice instalasaun rai ho susesu',
        'redirect_url' => route('invoiceinstalls.showinstalls', $invoiceInstall->nu_ref)
    ]);
}



    public function show($nu_ref)
{
    $nu_ref = urldecode($nu_ref); 
    $klientepakote = KlientePakotes::where('nu_ref', $nu_ref)
    ->with(['pakote', 'kliente','invoicesInstalls']) 
    ->latest()
    ->firstOrFail();
    // dd($klientePakote);

      if ($klientepakote->invoicesInstalls->isNotEmpty()) {
        return redirect()->back()->with('error', 'Invoice instalasaun la existe!');
    }
   
    return view('invoiceinstalls.showinstalls', compact('klientepakote'), [
        'title'=>'Invoice Kliente'
    ]);
}
   
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
    public function destroy(string $id)
    {
        //
    }
}
