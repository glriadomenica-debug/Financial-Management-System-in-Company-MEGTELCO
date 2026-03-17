@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📊 Relatoriu Movimentu {{ $accountName ?? 'Brankas I' }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('depositu.reportBrankas1') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="month" class="form-label">📅 Fulan</label>
                        <select class="form-control" id="month" name="month">
                            <option value="">-- Hili Fulan --</option>
                            @foreach($months as $key => $month)
                                <option value="{{ $key }}" {{ request('month') == $key ? 'selected' : '' }}>
                                    {{ $month }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="year" class="form-label">📅 Tinan</label>
                        <select class="form-control" id="year" name="year">
                            <option value="">-- Hili Tinan --</option>
                            @for($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success">🔍 Hare</button>
                        <a href="{{ route('depositu.reportBrankas1') }}" class="btn btn-secondary ms-2">🔄 Reset</a>
                    </div>
                </div>
            </form>
            
            @if(isset($transactions) && count($transactions) > 0)
                <div class="d-flex justify-content-between mb-3">
                    <h5>Movimentu {{ $accountName ?? 'Brankas I' }}</h5>
                    <button onclick="window.print()" class="btn btn-info">
                        <i class="fas fa-print"></i> Print
                    </button>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Data</th>
                                <th>Tipu Transasaun</th>
                                <th>Montante</th>
                                <th>Kreditu/Debitu</th>
                                <th>Balansa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $trx)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($trx->data_depositu)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($trx->tipu_depositu_ba_id == $trx->account_id)
                                            {{ $trx->tipu_depositu_husi->tipu_depositu }} → {{ $accountName }}
                                        @else
                                            {{ $accountName }} → {{ $trx->tipu_depositu_ba->tipu_depositu }}
                                        @endif
                                        @if($trx->deskrisaun)
                                            <br><small>{{ $trx->deskrisaun }}</small>
                                        @endif
                                    </td>
                                    <td>${{ number_format($trx->montante, 2) }}</td>
                                    <td class="{{ $trx->transaction_type == 'Kreditu' ? 'text-success' : 'text-danger' }}">
                                        {{ $trx->transaction_type }}: ${{ number_format($trx->montante, 2) }}
                                    </td>
                                    <td>${{ number_format($trx->balance, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3 text-muted">
                    <small> {{ now()->format('d-m-Y H:i:s') }}</small>
                </div>
            @else
                <div class="alert alert-info">
                    Dadus laiha
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .card, .card * {
            visibility: visible;
        }
        .card {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            border: none;
        }
        .no-print {
            display: none !important;
        }
        .table {
            width: 100%;
            font-size: 12px;
        }
    }
</style>
@endsection