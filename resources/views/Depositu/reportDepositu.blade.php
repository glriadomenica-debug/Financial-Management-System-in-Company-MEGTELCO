@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📊 Relatoriu Dadus Depositu</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('depositu.filterReport') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="month" class="form-label">📅 Fulana</label>
                        <select class="form-control" id="month" name="month">
                            <option value="">-- Hili Fulana --</option>
                            @foreach($months as $key => $month)
                                <option value="{{ $key }}" {{ request('month') == $key ? 'selected' : '' }}>
                                    {{ $month }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-3 mb-3">
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
                    
                    <div class="col-md-3 mb-3">
                        <label for="tipu_depositu_husi_id" class="form-label">📤 Depositu Husi</label>
                        <select class="form-control" id="tipu_depositu_husi_id" name="tipu_depositu_husi_id">
                            <option value="">-- Hili Husi --</option>
                            @foreach($tipudepositus as $td)
                                <option value="{{ $td->id }}" {{ request('tipu_depositu_husi_id') == $td->id ? 'selected' : '' }}>
                                    {{ $td->tipu_depositu }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for="tipu_depositu_ba_id" class="form-label">📥 Depositu Ba</label>
                        <select class="form-control" id="tipu_depositu_ba_id" name="tipu_depositu_ba_id">
                            <option value="">-- Hili Ba --</option>
                            @foreach($tipudepositus as $td)
                                <option value="{{ $td->id }}" {{ request('tipu_depositu_ba_id') == $td->id ? 'selected' : '' }}>
                                    {{ $td->tipu_depositu }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">🔍 Hare</button>
                    <a href="{{ route('depositu.report') }}" class="btn btn-secondary">🔄 Reset</a>
                </div>
            </form>
            
            @if(isset($depositus) && count($depositus) > 0)
                <div class="d-flex justify-content-between mb-3">
                    <h5>Relatoriu Dadus Depositu</h5>
                    <button onclick="window.print()" class="btn btn-info">
                        <i class="fas fa-print"></i> Print
                    </button>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>NO</th>
                                <th>Data</th>
                                <th>Husi</th>
                                <th>Ba</th>
                                <th>Montante ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depositus as $dp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dp->data_depositu)->format('d-m-Y') }}</td>
                                    <td>{{ $dp->tipu_depositu_husi ? $dp->tipu_depositu_husi->tipu_depositu : 'N/A' }}</td>
                                    <td>{{ $dp->tipu_depositu_ba ? $dp->tipu_depositu_ba->tipu_depositu : 'N/A' }}</td>
                                    <td>${{ number_format($dp->montante, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr class="table-info">
                                <td colspan="4" class="text-end"><strong>Total Montante:</strong></td>
                                <td><strong>${{ number_format($totalMontante, 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3 text-muted">
                    <small>Relatoriu generadu iha: {{ now()->format('d-m-Y H:i:s') }}</small>
                </div>
            @else
                <div class="alert alert-info">
                    La iha dadus depositu ne'ebe hetan ho filtru ne'e.
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
        }
        .table-info {
            background-color: #d1ecf1 !important;
        }
    }
</style>
@endsection