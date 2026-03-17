@extends('layouts.main')
@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Lista Invoice Instalasaun</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Nu. Referensia</th>
                        <th>Naran</th>
                        {{-- <th>Pakote</th> --}}
                        <th>Presu Instalasaun</th>
                        <th>Status </th>
                        <th>Data Imprimi</th>
                        {{-- <th>Asaun</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dadusinstall as $klientePakote)
                        @php
                            $hasInstallationInvoice = $klientePakote->invoicesInstalls->isNotEmpty();
                            
                        @endphp
                        <tr>
                            <td>
                                <a href="{{ route('invoiceinstalls.showinstalls', ['nu_ref' => urlencode($klientePakote->nu_ref)]) }}">
                                    {{ $klientePakote->nu_ref }}
                                </a>
                            </td>
                            <td>{{ $klientePakote->kliente->naran ?? '-' }}</td>
                            <td>${{ $klientePakote->presu_instalasaun ?? '-' }}</td>
                            <td>
                                @if($hasInstallationInvoice)
                                    <span class="badge bg-success">Imprimi ona</span>
                                @else
                                    <span class="badge bg-secondary">Seidauk Imprimi</span>
                                @endif
                            </td>
                            <td>
                                @if($hasInstallationInvoice)
                                {{ Carbon\Carbon::parse($klientePakote->invoicesInstalls
                                ->first()->data_faktura)->format('d/m/Y') }}                                
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
</style>
@endsection