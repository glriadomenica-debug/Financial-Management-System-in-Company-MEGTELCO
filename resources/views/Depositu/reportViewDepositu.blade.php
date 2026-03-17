@extends('layouts.main')

@section('container')
<div class="container mt-4" id="report-content">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $title }}</h5>
            </div>
        </div>
        <div class="card-body">
            @if($reportType == 'annual')
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 40%; text-align: left">Transfer Husi</th>
                            <th style="width: 10%; text-align: center">→</th>
                            <th style="width: 40%; text-align: left">Ba</th>
                            <th style="width: 10%; text-align: right">Total ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groupedDeposits as $group)
                            @php
                                $firstItem = $group->first();
                            @endphp
                        <tr>
                            <td style="text-align: left">
                                {{ $firstItem->tipu_depositu_husi->tipu_depositu }}
                            </td>
                            <td style="text-align: center">→</td>
                            <td style="text-align: left">
                                {{ $firstItem->tipu_depositu_ba->tipu_depositu }}
                            </td>
                            <td style="text-align: right">${{ number_format($group->sum('montante'), 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="font-weight-bold">
                        <tr>
                            <td colspan="3" style="text-align: left">Total Annual {{ $year }}</td>
                            <td style="text-align: right">${{ number_format($totalAmount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            @elseif($reportType == 'monthly')
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 20%; text-align: left">Data</th>
                            <th style="width: 30%; text-align: left">Husi</th>
                            <th style="width: 30%; text-align: left">Ba</th>
                            <th style="width: 20%; text-align: right">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deposits as $deposit)
                        <tr>
                            <td style="text-align: left">{{ date('d/m/Y', strtotime($deposit->data_depositu)) }}</td>
                            <td style="text-align: left">{{ $deposit->tipu_depositu_husi->tipu_depositu }}</td>
                            <td style="text-align: left">{{ $deposit->tipu_depositu_ba->tipu_depositu }}</td>
                            <td style="text-align: right">${{ number_format($deposit->montante, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="font-weight-bold">
                        <tr>
                            <td colspan="3" style="text-align: left">Total Fulan {{ $months[$month] ?? $month }} {{ $year }}</td>
                            <td style="text-align: right">${{ number_format($totalAmount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            @elseif($reportType == 'deposit_type')
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 20%; text-align: left">Data</th>
                            <th style="width: 30%; text-align: left">Husi</th>
                            <th style="width: 30%; text-align: left">Ba</th>
                            <th style="width: 20%; text-align: right">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deposits as $deposit)
                        <tr>
                            <td style="text-align: left">{{ date('d/m/Y', strtotime($deposit->data_depositu)) }}</td>
                            <td style="text-align: left">{{ $deposit->tipu_depositu_husi->tipu_depositu }}</td>
                            <td style="text-align: left">{{ $deposit->tipu_depositu_ba->tipu_depositu }}</td>
                            <td style="text-align: right">${{ number_format($deposit->montante, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="font-weight-bold">
                        <tr>
                            <td colspan="3" style="text-align: left">
                                Total {{ $tipu_depositu->tipu_depositu }} 
                                ({{ $direction == 'husi' ? 'Husi' : 'Ba' }})
                                @isset($monthName) iha Fulan {{ $monthName }} @endisset
                                iha Tinan {{ $year }}
                            </td>
                            <td style="text-align: right">${{ number_format($totalAmount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @endif
            
            <div class="mt-4 d-print-none button-container">
                <a href="{{ route('depositu.report') }}" class="btn btn-secondary mr-2">
                    <i class="fas fa-arrow-left mr-1"></i> Fila 
                </a>
                <button class="btn btn-danger" id="generate-pdf">
                    <i class="fas fa-file-pdf mr-1"></i> PDF
                </button>
            </div>
        </div>
    </div>
</div>

<!-- jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('generate-pdf').addEventListener('click', function() {
            document.querySelector('.button-container').style.display = 'none';
            
            const { jsPDF } = window.jspdf;
            const element = document.getElementById('report-content');
            
            html2canvas(element, {
                scale: 2,
                logging: false,
                useCORS: true
            }).then(canvas => {
                document.querySelector('.button-container').style.display = 'block';
                
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('p', 'mm', 'a4');
                const imgWidth = 210;
                const pageHeight = 295;
                const imgHeight = canvas.height * imgWidth / canvas.width;
                
                pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
                pdf.save('Relatoriu_Depositu_{{ $reportType }}_{{ $year ?? '' }}_{{ $month ?? '' }}.pdf');
            });
        });
    });
</script>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #report-content, #report-content * {
            visibility: visible;
        }
        #report-content {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .d-print-none {
            display: none !important;
        }
        .card {
            border: none !important;
            box-shadow: none !important;
        }
        .table {
            font-size: 0.9rem;
        }
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .table th {
        white-space: nowrap;
    }
    tfoot td {
        font-weight: bold;
    }
    .text-right {
        text-align: right !important;
    }
    .button-container {
        display: block; 
    }
</style>
@endsection