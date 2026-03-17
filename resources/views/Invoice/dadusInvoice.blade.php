@extends('layouts.main')
@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Lista Invoice Kliente</h5>
            <div class="month-selector">
                <form method="GET" action="{{ route('invoice.dadusInvoice') }}" class="form-inline">
                    <div class="form-group mr-2">
                        <select name="month" class="form-control" onchange="this.form.submit()">
                            @foreach($months as $key => $month)
                                <option value="{{ $key }}" {{ $selectedMonth == $key ? 'selected' : '' }}>
                                    {{ $month }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="year" class="form-control" onchange="this.form.submit()">
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                Invoice fulan: <strong>{{ $months[$selectedMonth] }} {{ $selectedYear }}</strong>
            </div>
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Nu. Referensia</th>
                        <th>Kliente</th>
                        <th>Pakote</th>
                        <th>Status</th>
                        <th>Data Imprimi</th>
                        {{-- <th>Asaun</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dadusinvoice as $klientePakote)
                        @php
                            $currentInvoice = $klientePakote->invoices->first();
                        @endphp
                            <tr class="{{ $klientePakote->status == 'inactive' ? 'table-warning' : '' }}">
                                <td>
                                    <a href="{{ route('invoice.show', ['nu_ref' => urlencode($klientePakote->nu_ref)]) }}">
                                        {{ $klientePakote->nu_ref }}
                                        @if($klientePakote->status == 'inactive')
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </a>
                                </td>
                            <td>{{ $klientePakote->kliente->naran ?? '-' }}</td>
                            <td>{{ $klientePakote->pakote->pakote ?? '-' }}</td>
                            <td>
                                @if($currentInvoice)
                                    <span class="badge bg-success">Imprimi ona</span>
                                @else
                                    <span class="badge bg-secondary">Seidauk Imprimi</span>
                                @endif
                            </td>
                            <td>
                                @if($currentInvoice)
                                    {{ \Carbon\Carbon::parse($currentInvoice->data_faktura)->format('d/m/Y') }}
                                @else
                                    -
                                @endif
                            </td>
                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 0.85em;
    }
    .bg-success {
        background-color: #28a745;
    }
    .bg-secondary {
        background-color: #6c757d;
        color: white;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }
    .thead-light {
        background-color: #f8f9fa;
    }
    .month-selector {
        display: flex;
        gap: 10px;
    }
    .form-inline {
        display: flex;
        gap: 10px;
    }

    .table-warning {
    background-color: rgba(255,193,7,0.1);
}
.badge.bg-danger {
    background-color: #dc3545;
    color: white;
    padding: 3px 6px;
    border-radius: 4px;
    font-size: 0.75em;
}
</style>
@endsection