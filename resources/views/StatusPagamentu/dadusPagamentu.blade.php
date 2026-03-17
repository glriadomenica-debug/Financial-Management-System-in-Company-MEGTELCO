@extends('layouts.main')
@php
use Carbon\Carbon;
@endphp
@section('container')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista Kliente ho Pagamentu</h6>
            <div class="row mt-3">
                <div class="col-md-6">
                    <form method="GET" action="">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <select name="month" class="form-control">
                                    @foreach($months as $key => $month)
                                        <option value="{{ $key }}" {{ $key == $currentMonth ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <select name="year" class="form-control">
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Buka</button>
                            </div>
                            
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- <button id="saveBtn" class="btn btn-success mr-2">
                <i class="fas fa-save"></i> Save
            </button>
            <button id="updateBtn" class="btn btn-primary">
                <i class="fas fa-sync-alt"></i> Update
            </button> --}}
            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="min-width: 1500px;">
                    <thead>
                        <tr style="position: sticky; top: 0; background: white; z-index: 10;">
                            <th>No</th>
                            <th>Nu. Ref</th>
                            <th>Kliente</th>
                            <th>Pakote</th>
                            <th style="background-color: #FFE5B4;">New Installation</th>
                            <th style="background-color: #FFFF99;">Outstanding Payment</th>
                            <th style="background-color: #006400; color: white;">Invoice/Fulan</th>
                            <th style="background-color: #FFD580;">Total Faktura</th>
                            <th style="background-color: #90EE90;">Selu ona (pakote internet)</th>
                            <th style="background-color: #e6ebe6;">Data selu (pakote internet)</th>
                            <th style="background-color: #FFE5B4;">Selu (Instalasaun)</th>
                            <th style="background-color: #e6ebe6;">Data selu (Instalasaun)</th>
                            <th style="background-color: #9b0505;">Iha devida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalNewInstall = 0;
                            $totalOutstanding = 0;
                            $totalCurrentInvoice = 0;
                            $totalFakturaAll = 0;
                            $totalSeluOna = 0;
                            $totalInstallPayment = 0;
                            $totalDebt = 0;
                
                            $previousMonth = $currentMonth - 1;
                            $previousYear = $currentYear;
                            if ($previousMonth == 0) {
                                $previousMonth = 12;
                                $previousYear -= 1;
                            }
                        @endphp
                        @foreach($klientePakotes as $index => $kliente)
                        {{-- <tr data-kliente-id="{{ $kliente->id }}"> --}}
                        @php
                           // --- NEW INSTALLATION ---
                            $newInstallation = 0;
                            $firstInvoiceInstall = $kliente->invoicesInstalls->first();
                            if ($firstInvoiceInstall && 
                                Carbon::parse($firstInvoiceInstall->created_at)->month == $currentMonth &&
                                Carbon::parse($firstInvoiceInstall->created_at)->year == $currentYear) {
                                $newInstallation = $kliente->invoicesInstalls->sum('total');
                            }
                     
                            // KALKULA OUTSTANDING
                            $outstanding = $kliente->outstanding;
        
                            // --- MONTANTE INVOICE/FULAN ---
                            $currentInvoice = $kliente->printedInvoices->sum('total');

                            // --- TOTAL FAKTURA ---
                            $totalFaktura = $newInstallation + $outstanding + $currentInvoice;

                            // --- PAGAMENTU INTERNET ---
                            $paymentAmount = $kliente->likidasauns->filter(function($pay) use ($currentMonth, $currentYear) {
                                return Carbon::parse($pay->data_likidasaun)->month == $currentMonth &&
                                       Carbon::parse($pay->data_likidasaun)->year == $currentYear;
                            })->sum('selu');
                            $paymentDate = $kliente->likidasauns->filter(function($pay) use ($currentMonth, $currentYear) {
                                return Carbon::parse($pay->data_likidasaun)->month == $currentMonth &&
                                       Carbon::parse($pay->data_likidasaun)->year == $currentYear;
                            })->first();
                            $paymentDate = $paymentDate ? Carbon::parse($paymentDate->data_likidasaun)->format('d/m/Y') : '';

                            //SURA PAGAMENTU INSTALLATION
                            $installPayment = $kliente->likidasaunsInstalls->filter(function($pay) use ($currentMonth, $currentYear) {
                                return Carbon::parse($pay->data)->month == $currentMonth &&
                                       Carbon::parse($pay->data)->year == $currentYear;
                            })->sum('montante');
                            $installDate = $kliente->likidasaunsInstalls->filter(function($pay) use ($currentMonth, $currentYear) {
                                return Carbon::parse($pay->data)->month == $currentMonth &&
                                       Carbon::parse($pay->data)->year == $currentYear;
                            })->first();
                            $installDate = $installDate ? Carbon::parse($installDate->data)->format('d/m/Y') : '';
                            // --- IHA DEVIDA ---
                            $debt = $totalFaktura - $paymentAmount - $installPayment;
                            // SURA TOTAL
                            $totalNewInstall += $newInstallation;
                            $totalOutstanding += $outstanding;
                            $totalCurrentInvoice += $currentInvoice;
                            $totalFakturaAll += $totalFaktura;
                            $totalSeluOna += $paymentAmount;
                            $totalInstallPayment += $installPayment;
                            $totalDebt += $debt;
                        @endphp
                        <tr data-kliente-id="{{ $kliente->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kliente->nu_ref }}</td>
                            <td>{{ $kliente->naran }}</td>
                            <td>
                                @if($kliente->pakote)
                                    {{ $kliente->pakote->pakote }}
                                @else
                                    Pakote la existe
                                @endif
                            </td>
                            
                            <td>$ {{ number_format($newInstallation, 2) }}</td>
                            <td>$ {{ number_format($outstanding, 2) }}</td>
                            <td>$ {{ number_format($currentInvoice, 2) }}</td>
                            <td>$ {{ number_format($totalFaktura, 2) }}</td>
                            <td>$ {{ number_format($paymentAmount, 2) }}</td>
                            <td>{{ $paymentDate }}</td>
                            <td>$ {{ number_format($installPayment, 2) }}</td>
                            <td>{{ $installDate }}</td>
                            <td>$ {{ number_format($debt, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style="position: sticky; bottom: 0; background: white; z-index: 10;">
                        <tr>
                            <th colspan="4" class="text-right">Total:</th>
                            <th style="background-color: #FFE5B4;">$ {{ number_format($totalNewInstall, 2) }}</th>
                            <th style="background-color: #FFFF99;">$ {{ number_format($totalOutstanding, 2) }}</th>
                            <th style="background-color: #006400; color: white;">$ {{ number_format($totalCurrentInvoice, 2) }}</th>
                            <th style="background-color: #FFD580;">$ {{ number_format($totalFakturaAll, 2) }}</th>
                            <th style="background-color: #90EE90;">$ {{ number_format($totalSeluOna, 2) }}</th>
                            <th style="background-color: #e6ebe6;">-</th>
                            <th style="background-color: #FFE5B4;">$ {{ number_format($totalInstallPayment, 2) }}</th>
                            <th style="background-color: #e6ebe6;">-</th>
                            <th style="background-color: #9b0505;">$ {{ number_format($totalDebt, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .badge {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
    }
    .bg-success {
        background-color: #28a745;
        color: white;
    }
    .bg-warning {
        background-color: #ffc107;
        color: black;
    }
    .bg-secondary {
        background-color: #6c757d;
        color: white;
    }
 /* koluna Styles */
 td:nth-child(5), th:nth-child(5) { /* New Installation */
        background-color: #FFE5B4; 
    }
    
    td:nth-child(6), th:nth-child(6) { /* Outstanding Payment */
        background-color: #FFFF99; 
    }
    
    td:nth-child(7), th:nth-child(7) { /* Invoice/Fulan */
        background-color: #006400; /* Dark green */
        color: white; 
    }
    
    td:nth-child(8), th:nth-child(8) { /* Total Faktura */
        background-color: #FFD580; 
    }
    
    td:nth-child(9), th:nth-child(9) { /* Selu ona */
        background-color: #90EE90; 
    }
    
    td:nth-child(13), th:nth-child(13) { /* Iha devida */
        background-color: #9b0505; 
    }
    td:nth-child(10), th:nth-child(10) { /* selu internet/Fulan */
        background-color: #e6ebe6; 
        color: rgb(19, 1, 1); 
    }

    td:nth-child(12), th:nth-child(12) { /* selu install */
        background-color: #e6ebe6;
        color: rgb(19, 1, 1); 
    }

    td:nth-child(11), th:nth-child(11) { /* dataInstallation */
        background-color: #FFE5B4;
    }    
    .table-responsive {
        overflow-x: auto;
        max-width: 100%;
    }
    thead tr {
        position: sticky;
        top: 0;
        background: white;
        z-index: 10;
    }    
    tfoot tr {
        position: sticky;
        bottom: 0;
        background: white;
        z-index: 10;
    }
    .card-body {
        min-height: 700px;
    }
    
    #dataTable {
        min-width: 1500px;
    }
  
</style>

<script>
$(document).ready(function() {
    function parseCurrency(text) {
        return parseFloat(text.replace(/[^\d.-]/g, '')) || 0;
    }

    $('#saveBtn').click(function() {
        const month = $('select[name="month"]').val();
        const year = $('select[name="year"]').val();
        
        const paymentData = {};
        
        $('tbody tr[data-kliente-id]').each(function() {
            const klienteId = $(this).data('kliente-id');
            
            paymentData[klienteId] = {
                selu_ona: parseCurrency($(this).find('td:nth-child(9)').text()),
                data_selu: $(this).find('td:nth-child(10)').text().trim(),
                selu_instalasaun: parseCurrency($(this).find('td:nth-child(11)').text()),
                data_selu_instalasaun: $(this).find('td:nth-child(12)').text().trim(),
                iha_devida: parseCurrency($(this).find('td:nth-child(13)').text())
            };
        });

        $.ajax({
            url: '{{ route("statuspagamentu.save") }}',
            method: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                month: month,
                year: year,
                data: paymentData
            },
            success: function(response) {
                if(response.success) {
                    alert(response.message);
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    alert('Error: ' + (response.message || xhr.statusText));
                } catch (e) {
                    alert('Error: ' + xhr.statusText);
                }
                console.error('Error:', xhr.responseText);
            }
        });
    });
});
    </script>



@endsection