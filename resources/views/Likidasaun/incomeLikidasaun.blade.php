{{-- @extends('layouts.main')

@section('container')
<div class="container mt-4" id="report-content">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📊 Relatoriu Likidasaun</h5>
            </div>
        </div>
        <div class="card-body">
            <!-- Combined Statistics Section -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <h6 class="card-title">Total Likidasaun Pakote Internet</h6>
                            <h4 class="text-primary">${{ number_format($stats['internet']['total'], 2, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <h6 class="card-title">Total Likidasaun Instalasaun</h6>
                            <h4 class="text-primary">${{ number_format($stats['instalasaun']['total'], 2, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <h6 class="card-title">Total Geral Likidasaun</h6>
                            <h4 class="text-primary">${{ number_format($stats['total_geral'], 2, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Methods Section -->
            <h5 class="mb-3">Total Selu husi Metodu Pagamentu</h5>
            <div class="row mb-4">
                @foreach($stats['payment_methods'] as $method)
                <div class="col-md-4 mb-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $method['naran'] }}</h6>
                            <h4 class="text-primary">${{ number_format($method['total'], 2, ',', '.') }}</h4>
                            <small class="text-muted">{{ round(($method['total'] / $stats['total_geral']) * 100, 2) }}% husi total</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Internet Package Section -->
            <h5 class="mb-3 mt-4">Detallu Likidasaun Pakote Internet</h5>
            <div class="table-responsive mb-5">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 15%; text-align: left">Data</th>
                            <th style="width: 20%; text-align: left">Naran</th>
                            <th style="width: 25%; text-align: left">Deskrisaun</th>
                            <th style="width: 20%; text-align: left">Metodu Pagamentu</th>
                            <th style="width: 20%; text-align: right">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['internet'] as $likidasaun)
                        <tr>
                            <td style="text-align: left">{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                            <td style="text-align: left">{{ $likidasaun->naran }}</td>
                            <td style="text-align: left">{{ $likidasaun->deskrisaun }}</td>
                            <td style="text-align: left">{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                            <td style="text-align: right">{{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="font-weight-bold">
                        <tr>
                            <td colspan="4" style="text-align: left">Total Likidasaun Pakote Internet {{ $reportType == 'annual' ? 'Tinan '.$year : 'Fulan '.$month }}:</td>
                            <td style="text-align: right">{{ number_format($stats['internet']['total'], 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Installation Section -->
            <h5 class="mb-3 mt-4">Detallu Likidasaun Instalasaun</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 15%; text-align: left">Data</th>
                            <th style="width: 20%; text-align: left">Naran</th>
                            <th style="width: 25%; text-align: left">Deskrisaun</th>
                            <th style="width: 20%; text-align: left">Metodu Pagamentu</th>
                            <th style="width: 20%; text-align: right">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['instalasaun'] as $likidasaun)
                        <tr>
                            <td style="text-align: left">{{ date('d/m/Y', strtotime($likidasaun->data)) }}</td>
                            <td style="text-align: left">{{ $likidasaun->naran }}</td>
                            <td style="text-align: left">{{ $likidasaun->deskrisaun }}</td>
                            <td style="text-align: left">{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                            <td style="text-align: right">{{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="font-weight-bold">
                        <tr>
                            <td colspan="4" style="text-align: left">Total Likidasaun Instalasaun {{ $reportType == 'annual' ? 'Tinan '.$year : 'Fulan '.$month }}:</td>
                            <td style="text-align: right">{{ number_format($stats['instalasaun']['total'], 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Summary Section -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Resumu Geral</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Total Likidasaun Pakote Internet: <strong>${{ number_format($stats['internet']['total'], 2, ',', '.') }}</strong></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Total Likidasaun Instalasaun: <strong>${{ number_format($stats['instalasaun']['total'], 2, ',', '.') }}</strong></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Total Geral Likidasaun: <strong>${{ number_format($stats['total_geral'], 2, ',', '.') }}</strong></p>
                                </div>
                            </div>
                            <p>Periodu: <strong>{{ $reportType == 'annual' ? 'Tinan '.$year : 'Fulan '.$month.' '.$year }}</strong></p>
                            <p>Total Transasaun: <strong>{{ $stats['total_transactions'] }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-print-none button-container">
                <a href="{{ route('likidasaun.combinedReport') }}" class="btn btn-secondary mr-2">
                    <i class="fas fa-arrow-left mr-1"></i> Fila
                </a>
                <button class="btn btn-danger" id="generate-pdf">
                    <i class="fas fa-file-pdf mr-1"></i> PDF
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('generate-pdf').addEventListener('click', function() {
        const button = this;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Prosesu...';
        button.disabled = true;
        
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('p', 'pt', 'a4');
        
        // Add title
        pdf.setFontSize(18);
        pdf.setTextColor(0, 0, 0);
        pdf.text('📊 Relatoriu Likidasaun', 40, 40);
        
        // Add period information
        pdf.setFontSize(12);
        pdf.text('Periodu: {{ $reportType == "annual" ? "Tinan ".$year : "Fulan ".$month." ".$year }}', 40, 70);
        
        // Add summary statistics
        pdf.setFontSize(14);
        pdf.text('Total Likidasaun Pakote Internet: ${{ number_format($stats["internet"]["total"], 2, ",", ".") }}', 40, 100);
        pdf.text('Total Likidasaun Instalasaun: ${{ number_format($stats["instalasaun"]["total"], 2, ",", ".") }}', 40, 130);
        pdf.setFont(undefined, 'bold');
        pdf.text('Total Geral Likidasaun: ${{ number_format($stats["total_geral"], 2, ",", ".") }}', 40, 160);
        
        // Add payment methods
        pdf.setFontSize(12);
        pdf.text('Total Selu husi Metodu Pagamentu:', 40, 190);
        let yPosition = 220;
        
        @foreach($stats['payment_methods'] as $method)
        pdf.text('{{ $method["naran"] }}: ${{ number_format($method["total"], 2, ",", ".") }} ({{ round(($method["total"] / $stats["total_geral"]) * 100, 2) }}% husi total)', 50, yPosition);
        yPosition += 20;
        @endforeach
        
        // Add Internet Package table
        pdf.setFontSize(14);
        pdf.text('Detallu Likidasaun Pakote Internet:', 40, yPosition + 30);
        
        // Prepare table data
        const internetHeaders = [
            {title: "Data", dataKey: "data"},
            {title: "Naran", dataKey: "naran"},
            {title: "Deskrisaun", dataKey: "deskrisaun"},
            {title: "Metodu Pagamentu", dataKey: "metodu"},
            {title: "Montante ($)", dataKey: "montante"}
        ];
        
        const internetData = [
            @foreach($data['internet'] as $likidasaun)
            {
                data: "{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}",
                naran: "{{ $likidasaun->naran }}",
                deskrisaun: "{{ $likidasaun->deskrisaun }}",
                metodu: "{{ $likidasaun->metoduPagamentu->metodu_selu }}",
                montante: "{{ number_format($likidasaun->montante, 2, ',', '.') }}"
            },
            @endforeach
        ];
        
        // Add autoTable for Internet
        pdf.autoTable({
            startY: yPosition + 60,
            head: [internetHeaders.map(h => h.title)],
            body: internetData.map(row => [
                row.data,
                row.naran,
                row.deskrisaun,
                row.metodu,
                row.montante
            ]),
            margin: {left: 40},
            styles: {
                fontSize: 9,
                cellPadding: 4,
                overflow: 'linebreak'
            },
            columnStyles: {
                4: {cellWidth: 'auto', halign: 'right'}
            }
        });
        
        // Add Installation table
        const finalYInternet = pdf.lastAutoTable.finalY + 20;
        pdf.setFontSize(14);
        pdf.text('Detallu Likidasaun Instalasaun:', 40, finalYInternet);
        
        // Prepare installation table data
        const instalasaunHeaders = [
            {title: "Data", dataKey: "data"},
            {title: "Naran", dataKey: "naran"},
            {title: "Deskrisaun", dataKey: "deskrisaun"},
            {title: "Metodu Pagamentu", dataKey: "metodu"},
            {title: "Montante ($)", dataKey: "montante"}
        ];
        
        const instalasaunData = [
            @foreach($data['instalasaun'] as $likidasaun)
            {
                data: "{{ date('d/m/Y', strtotime($likidasaun->data)) }}",
                naran: "{{ $likidasaun->naran }}",
                deskrisaun: "{{ $likidasaun->deskrisaun }}",
                metodu: "{{ $likidasaun->metoduPagamentu->metodu_selu }}",
                montante: "{{ number_format($likidasaun->montante, 2, ',', '.') }}"
            },
            @endforeach
        ];
        
        // Add autoTable for Installation
        pdf.autoTable({
            startY: finalYInternet + 20,
            head: [instalasaunHeaders.map(h => h.title)],
            body: instalasaunData.map(row => [
                row.data,
                row.naran,
                row.deskrisaun,
                row.metodu,
                row.montante
            ]),
            margin: {left: 40},
            styles: {
                fontSize: 9,
                cellPadding: 4,
                overflow: 'linebreak'
            },
            columnStyles: {
                4: {cellWidth: 'auto', halign: 'right'}
            }
        });
        
        // Add final summary
        const finalY = pdf.lastAutoTable.finalY + 20;
        pdf.setFontSize(12);
        pdf.setFont(undefined, 'bold');
        pdf.text(
            'Total Geral Likidasaun {{ $reportType == "annual" ? "Tinan ".$year : "Fulan ".$month." ".$year }}: ${{ number_format($stats["total_geral"], 2, ",", ".") }}', 
            40, 
            finalY
        );
        
        // Save PDF
        const reportType = "{{ $reportType ?? 'all' }}";
        const year = "{{ $year ?? date('Y') }}";
        const month = "{{ $month ?? '' }}";
        pdf.save(`Relatoriu_Likidasaun_${reportType}_${year}${month ? '_'+month : ''}.pdf`);
        
        button.innerHTML = originalText;
        button.disabled = false;
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
            top: 10px;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        .card {
            border: none !important;
            box-shadow: none !important;
        }
        .card-header {
            padding-top: 15px;  
            padding-bottom: 15px;
        }
        .card-header h5 {
            margin-bottom: 10px !important; 
        }
        .table {
            font-size: 0.8rem;
            width: 100% !important;
        }
        .d-print-none {
            display: none !important;
        }
        h5.mb-3 {
            margin-top: 15px !important;
            margin-bottom: 10px !important;
        }
        .card-body {
            padding-top: 10px !important;
        }
    }
    .table th, .table td {
        vertical-align: middle;
        padding: 8px 12px;
    }
    tfoot{
        font-weight:bold;
    }
    .table th {
        white-space: nowrap;
        background-color: #f8f9fa;
    }
    .table {
        text-align: left;
        margin-bottom: 1rem;
    }
    .text-right {
        text-align: right !important;
    }
    .button-container {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
        margin-top: 20px;
    }
    .card {
        margin-bottom: 20px;
    }
    h5 {
        margin-top: 10px;
        margin-bottom: 15px;
    }
    .card-header h5 {
        margin-bottom: 0.5rem;
    }
    .card.border-primary {
        border: 2px solid #007bff !important;
    }
</style>
@endsection --}}