@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ Aumenta Dadus Likidasaun</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('likidasaun.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="data_likidasaun" class="form-label">📅 Data Likidasaun</label>
                    <input type="date" id="data_likidasaun" name="data_likidasaun" class="form-control" value="{{ old('data_likidasaun') }}" required>
                </div>

                <div class="mb-3">
                    <label for="invoice_id" class="form-label">👤 Kliente</label>
                    @if($invoices->isEmpty())
                        <div class="alert alert-warning">
                            Kliente hotu-hotu selu hotu ona.
                        </div>
                    @else
                        <select id="invoice_id" name="invoice_id" class="form-control" required onchange="loadInvoiceData(this.value)">
                            <option value="" disabled selected>Hili Kliente</option>
                            @foreach ($invoices as $invoice)
                                @php
                                    $monthName = \Carbon\Carbon::create()->month($invoice->period_month)->translatedFormat('F');
                                    $year = $invoice->period_year;
                                @endphp
                                <option value="{{ $invoice->id }}" {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>
                                    {{ $invoice->nu_ref }} - {{ $invoice->naran }} - {{ $monthName }} {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="deskrisaun" class="form-label">📝 Deskrisaun</label>
                    <input type="text" id="deskrisaun" name="deskrisaun" class="form-control" value="{{ old('deskrisaun') }}" placeholder="Deskrisaun sei preense automátiku" required readonly>
                </div>

                <div class="mb-3">
                    <label for="metodu_pagamentu_id" class="form-label">💳 Metodu Pagamentu</label>
                    <select id="metodu_pagamentu_id" name="metodu_pagamentu_id" class="form-control" required>
                        <option value="" disabled selected>Hili Metodu Pagamentu</option>
                        @foreach ($metodu_pagamentus as $metodu)
                            <option value="{{ $metodu->id }}" {{ old('metodu_pagamentu_id') == $metodu->id ? 'selected' : '' }}>
                                {{ $metodu->metodu_selu }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="montante" class="form-label">💰 Presu / Fulan</label>
                    <input type="number" id="montante" name="montante" class="form-control" value="{{ old('montante') }}" placeholder="Presu sei preense automátiku" required readonly>
                </div>
                
                <div class="mb-3">
                    <label for="selu" class="form-label">💰 Montante selu </label>
                    <input type="number" id="selu" name="selu" class="form-control" value="{{ old('selu') }}" placeholder="Insere montante selu" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('likidasaun.dadusLikidasaun') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function loadInvoiceData(invoiceId) {
        if (invoiceId) {
            document.getElementById('deskrisaun').value = "Loading...";
            document.getElementById('montante').value = "";
    
            fetch(`/get-invoice-data/${invoiceId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('deskrisaun').value = data.deskrisaun;
                    document.getElementById('montante').value = data.montante;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('deskrisaun').value = "Error loading";
                    document.getElementById('montante').value = "";
                });
        }
    }
    </script>
@endsection
