@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">✏️ Edit Dadus Likidasaun</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('likidasaun.update', $likidasaun->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                

                <div class="mb-3">
                    <label for="data_likidasaun" class="form-label">📅 Data Likidasaun</label>
                    <input type="date" id="data_likidasaun" name="data_likidasaun" class="form-control" value="{{ old('data_likidasaun', $likidasaun->data_likidasaun) }}" required>
                </div>

{{--                 
                <div class="mb-3">
                    <label for="kliente_id" class="form-label">👤 Selu Husi Kliente</label>
                    <select id="kliente_id" name="kliente_id" class="form-control" required>
                        <option value="" disabled selected>Hili Kliente</option>
                        @foreach ($klientes as $kliente)
                            <option value="{{ $kliente->id }}" {{ $kliente->id == $likidasaun->kliente_id ? 'selected' : '' }}>
                                {{ $kliente->naran }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskrisaun" class="form-label">📝 Deskrisaun</label>
                    <input type="text" id="deskrisaun" name="deskrisaun" class="form-control" value="{{ old('deskrisaun', $likidasaun->deskrisaun) }}" placeholder="Insere deskrisaun" required>
                </div> --}}

                {{-- <div class="mb-3">
                    <label for="invoice_id" class="form-label">👤 Kliente</label>
                    <select id="invoice_id" name="invoice_id" class="form-control" required onchange="loadInvoiceData(this.value)">
                        <option value="" disabled selected>Hili Kliente</option>
                        @foreach ($invoices as $invoice)
                            @php
                                $monthName = \Carbon\Carbon::create()->month($invoice->period_month)->translatedFormat('F');
                                $year = $invoice->period_year;
                            @endphp
                            <option value="{{ $invoice->id }}" {{ $invoice->id == $likidasaun->invoice_id ? 'selected' : '' }}>
                                {{ $invoice->naran }} - {{ $monthName }} {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-3">
                    <label class="form-label">👤 Kliente</label>
                    <input type="text" class="form-control" 
                           value="{{ $likidasaun->naran }}@if($likidasaun->invoice) - {{ \Carbon\Carbon::create()->month($likidasaun->invoice->period_month)->translatedFormat('F') }} {{ $likidasaun->invoice->period_year }}@endif" 
                           readonly>
                    <input type="hidden" name="invoice_id" value="{{ $likidasaun->invoice_id }}">
                    <small class="text-muted">Kliente labele muda, informasaun ne'e permanente.</small>
                </div>
                
                
                <div class="mb-3">
                    <label for="deskrisaun" class="form-label">📝 Deskrisaun</label>
                    <input type="text" id="deskrisaun" name="deskrisaun" class="form-control" value="{{ old('deskrisaun', $likidasaun->deskrisaun) }}" required readonly>
                </div>
                
                <div class="mb-3">
                    <label for="metodu_pagamentu_id" class="form-label">💳 Metodu Pagamentu</label>
                    <select id="metodu_pagamentu_id" name="metodu_pagamentu_id" class="form-control" required>
                        <option value="" disabled selected>Hili Metodu Pagamentu</option>
                        @foreach ($metodu_pagamentus as $metodu)
                            <option value="{{ $metodu->id }}" {{ $metodu->id == $likidasaun->metodu_pagamentu_id ? 'selected' : '' }}>
                                {{ $metodu->metodu_selu }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="montante" class="form-label">💰 Presu / Fulan</label>
                    <input type="number" id="montante" name="montante" class="form-control" value="{{ old('montante', $likidasaun->montante) }}" required readonly>
                    <small class="text-muted">Valor presu labele muda, valor $ husi invoice internet</small>
                </div>
                
{{-- 
        
                <div class="mb-3">
                    <label for="montante" class="form-label">💰 Presu / Fulan</label>
                    <input type="number" id="montante" name="montante" class="form-control" value="{{ old('montante', $likidasaun->montante) }}" placeholder="Insere presu/fulan" required>
                </div> --}}

                <div class="mb-3">
                    <label for="selu" class="form-label">💰 Montante selu </label>
                    <input type="number" id="selu" name="selu" class="form-control" value="{{ old('selu', $likidasaun->selu) }}" placeholder="Insere montante selu" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Update Dadus</button>
                    <a href="{{ route('likidasaun.dadusLikidasaun') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
