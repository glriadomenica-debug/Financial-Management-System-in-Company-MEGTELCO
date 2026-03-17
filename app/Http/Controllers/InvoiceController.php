<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\KlientePakotes;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index(Request $request)
{
    $selectedMonth = $request->input('month', now()->month);
    $selectedYear = $request->input('year', now()->year);
  
    $dadusinvoice = KlientePakotes::forInvoices($selectedMonth, $selectedYear)
        ->with(['pakote', 'kliente', 'invoices' => function($query) use ($selectedMonth, $selectedYear) {
        $query->where('period_month', $selectedMonth)
             ->where('period_year', $selectedYear);
        }])
        ->get();
        $months = [
            1 => 'Janeiru', 2 => 'Fevereiru', 3 => 'Marsu',
            4 => 'Abril', 5 => 'Maiu', 6 => 'Junhu',
            7 => 'Julhu', 8 => 'Agostu', 9 => 'Setembru',
            10 => 'Outubru', 11 => 'Novembru', 12 => 'Dezembru'
            ];  
        $years = range(now()->year - 2, now()->year + 1);

        return view('Invoice.dadusInvoice', compact('dadusinvoice', 'months', 'years', 'selectedMonth', 'selectedYear'), [
            'title' => 'Lista Invoice Kliente'
        ]);   
}
    public function storeInvoice(Request $request)
{
    $currentMonth = now()->month;
    $currentYear = now()->year;

    $existingInvoice = Invoice::where('kliente_pakotes_id', $request->kliente_pakotes_id)
                            ->where('period_month', $currentMonth)
                            ->where('period_year', $currentYear)
                            ->first();

    if ($existingInvoice) {
        return response()->json([
            'success' => false,
            'message' => 'Invoice ba fulan nee iha ona!'
        ]);
    }

    $validatedData = $request->validate([
        'nu_ref' => 'required',
        'data_faktura' => 'required|date',
        'data_limite_pagamentu' => 'required|date',
        'naran' => 'required|string',
        'residensia' => 'required|string',
        'nu_telfone' => 'required|numeric',
        'subtotal' => 'required|numeric',
        'tax' => 'required|numeric',
        'maintenance' => 'required|numeric',
        'total' => 'required|numeric',
    ]);

    $klientePakote = KlientePakotes::where('nu_ref', $request->nu_ref)->firstOrFail();
    $fulanAgora = now()->translatedFormat('F');
    $dataRegistu = Carbon::parse($klientePakote->kliente->data);
    $dataHahu = Carbon::createFromDate(now()->year, now()->month, $dataRegistu->day);
    $dataIkus = $dataHahu->copy()->addMonth()->subDay();
    
    $deskrisaun = [
        [
            'text' => "Fornesimentu servisu Internet, {$klientePakote->pakote->pakote}, 
            fulan {$fulanAgora}, hosi dia {$dataHahu->format('d F')} too {$dataIkus->format('d F Y')}",
            'montante' => $klientePakote->presu_pakote
        ]
    ];
    $invoice = new Invoice();
    $invoice->nu_ref = $request->nu_ref;
    $invoice->data_faktura = $request->data_faktura;
    $invoice->data_limite_pagamentu = $request->data_limite_pagamentu;
    $invoice->naran = $request->naran;
    $invoice->residensia = $request->residensia;
    $invoice->nu_telfone = $request->nu_telfone;
    $invoice->period_month = $currentMonth;
    $invoice->period_year = $currentYear;
    $invoice->deskrisaun = json_encode($deskrisaun);
    $invoice->subtotal = $request->subtotal;
    $invoice->tax = $request->tax;
    $invoice->maintenance = $request->maintenance;
    $invoice->total = $request->total;
    $invoice->kliente_pakotes_id = $klientePakote->id;
    $invoice->is_printed = true;
    
    $invoice->save();

    return response()->json([
        'success' => true, 
        'invoice' => $invoice,
        'redirect_url' => route('invoice.show', $invoice->nu_ref)
    ]);
}

    public function show($nu_ref)
{
    $nu_ref = urldecode($nu_ref); 
    $klientepakote = KlientePakotes::where('nu_ref', $nu_ref)
    ->with(['pakote', 'kliente','invoice']) 
    ->latest()
    ->firstOrFail();
    // dd($klientePakote);
    $invoice = $klientePakote->invoice ?? new Invoice();

    if (!$invoice) {
        return abort(404); 
    }
    return view('Invoice.show', compact('invoice','klientepakote'), [
        'title'=>'Invoice Kliente'
    ]);
}

    public function edit($nu_ref)
    {
        $invoice = Invoice::where('nu_ref',$nu_ref)->firstOrFail();  
        if (!$invoice) {
            return abort(404);
        } 
        dd($invoice->nu_ref); // Debugging
    
        return view('invoice.editInvoice', compact('invoice'), [
            'title' => 'Edit Invoice'
        ]);
    }
    
    public function update(Request $request, $nu_ref)
    {
        $invoice = Invoice::where('nu_ref', $nu_ref)->firstOrFail();
        $validatedData = $request->validate([
            'deskrisaun' => 'required|string', 
        ]);

        $invoice->update($validatedData);

        return redirect()->route('invoice.show', $invoice->nu_ref)
            ->with('success', 'Invoice update ho susesu!');
    }
    


    public function destroy(Invoice $invoice)
    {
        //
    }
}
