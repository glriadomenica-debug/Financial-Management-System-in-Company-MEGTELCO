@extends('layouts.main')

{{-- Report comparasaun Tinan no Fulan  --}}
@section('container')
<div class="container mt-4" id="report-content">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📊 {{ $title }}</h5>
            </div>
        </div>
        <div class="card-body">
            <div id="export-only" style="display: none;">
                <div class="export-header">
                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                        <div style="margin-right: 15px;">
                            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="height: 60px; width: 60px; object-fit: contain;">
                        </div>
                        <div>
                            <h2 style="margin: 0; color: #0d6efd; font-size: 16pt;">MEGTELCO S.A</h2>
                            <p style="margin: 0; font-size: 9pt;">Relatoriu Komparasaun Likidasaun</p>
                        </div>
                    </div>
                    <div style="text-align: right; font-size: 8pt;">
                        <p style="margin: 0;">Data: {{ date('d/m/Y') }}</p>
                        <p style="margin: 0;">{{ date('H:i') }}</p>
                    </div>
                    <h3 style="margin: 10px 0 15px 0; text-align: center; font-size: 12pt; font-weight: bold;">{{ $title }}</h3>
                </div>
                
                <!-- Summary stats for export -->
                <table style="width: 70%; margin-bottom: 15px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;" colspan="3">Total Likidasaun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left; width: 20%;">
                                @if($reportType == 'year_comparison')
                                    Tinan {{ $currentYear }}
                                @else
                                    Fulan {{ $month }} Tinan {{ $year }}
                                @endif
                            </td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right; width: 20%;">${{ number_format($currentTotal, 2, ',', '.') }}</td>
                           
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">
                                @if($reportType == 'year_comparison')
                                    Tinan {{ $comparisonYear }}
                                @else
                                    Fulan {{ $comparisonMonth }} Tinan {{ $year }}
                                @endif
                            </td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right;">${{ number_format($comparisonTotal, 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Metodu pagamentu ba export pdf/word -->
                <table style="width: 100%; margin-bottom: 15px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Metodu Pagamentu</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: right;">
                                @if($reportType == 'year_comparison')
                                    Tinan {{ $currentYear }}
                                @else
                                    {{ $month }} {{ $year }}
                                @endif
                            </th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: right;">
                                @if($reportType == 'year_comparison')
                                    Tinan {{ $comparisonYear }}
                                @else
                                    {{ $comparisonMonth }} {{ $year }}
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $allMethods = collect($currentPaymentMethods)
                            ->merge($comparisonPaymentMethods)
                            ->unique('naran')
                            ->sortBy('naran');
                            
                        $currentPaymentTotal = 0;
                        $comparisonPaymentTotal = 0;
                        @endphp
                        
                        @foreach($allMethods as $method)
                            @php
                                $current = collect($currentPaymentMethods)->firstWhere('naran', $method['naran']);
                                $comparison = collect($comparisonPaymentMethods)->firstWhere('naran', $method['naran']);
                                
                                $currentMethodTotal = $current['total'] ?? 0;
                                $comparisonMethodTotal = $comparison['total'] ?? 0;
                                
                                $currentPaymentTotal += $currentMethodTotal;
                                $comparisonPaymentTotal += $comparisonMethodTotal;
                            @endphp
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ $method['naran'] }}</td>
                                <td style="border: 1px solid #ddd; padding: 6px; text-align: right;">${{ number_format($currentMethodTotal, 2, ',', '.') }}</td>
                                <td style="border: 1px solid #ddd; padding: 6px; text-align: right;">${{ number_format($comparisonMethodTotal, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold;">
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">Total</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right;">${{ number_format($currentPaymentTotal, 2, ',', '.') }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right;">${{ number_format($comparisonPaymentTotal, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
                
                <!-- Tinan/fulan hahu -> Export -->
                <h5 style="margin: 15px 0 10px 0; font-size: 11pt; font-weight: bold;">
                    Detallu Likidasaun 
                    @if($reportType == 'year_comparison')
                        Tinan {{ $currentYear }}
                    @else
                        Fulan {{ $month }} Tinan {{ $year }}
                    @endif
                </h5>
                <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Data</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Naran</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Deskrisaun</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Metodu Pagamentu</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: right;">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $currentPeriodTotal = 0;
                        @endphp
                        @foreach($currentData as $likidasaun)
                        @php
                            $currentPeriodTotal += $likidasaun->montante;
                        @endphp
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ $likidasaun->naran }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ $likidasaun->deskrisaun }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right;">${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold;">
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: center;" colspan="4">Total</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: center;">${{ number_format($currentPeriodTotal, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>

                <!-- Kompara ba tinan/fulan -> Export -->
                <h5 style="margin: 15px 0 10px 0; font-size: 11pt; font-weight: bold;">
                    Detallu Likidasaun 
                    @if($reportType == 'year_comparison')
                        Tinan {{ $comparisonYear }}
                    @else
                        Fulan {{ $comparisonMonth }} Tinan {{ $year }}
                    @endif
                </h5>
                <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Data</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Naran</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Deskrisaun</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;">Metodu Pagamentu</th>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: right;">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $comparisonPeriodTotal = 0;
                        @endphp
                        @foreach($comparisonData as $likidasaun)
                        @php
                            $comparisonPeriodTotal += $likidasaun->montante;
                        @endphp
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ $likidasaun->naran }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ $likidasaun->deskrisaun }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left;">{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right;">${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold;">
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: center;" colspan="4">Total</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: center;">${{ number_format($comparisonPeriodTotal, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Content fo sai iha screen -->
            <div class="normal-display">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6 class="card-title">Total          
                                @if($reportType == 'year_comparison')
                                    Tinan {{ $currentYear }}
                                @else
                                    Fulan {{ $month }} Tinan {{ $year }}
                                @endif  
                            </h6>
                                <h4 class="text-primary">${{ number_format($currentTotal, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6 class="card-title">Total
                                @if($reportType == 'year_comparison')
                                    Tinan {{ $comparisonYear }}
                                @else
                                    Fulan {{ $comparisonMonth }} Tinan {{ $year }}
                                @endif
                                </h6>
                                <h4 class="text-primary">${{ number_format($comparisonTotal, 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Komparasaun Metodu pagamentu -->
                <h5 class="mb-3">Komparasaun Metodu Pagamentu</h5>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Metodu Pagamentu</th>
                                <th> @if($reportType == 'year_comparison')
                                    Tinan {{ $currentYear }}
                                @else
                                     {{ $month }} {{ $year }}
                                @endif </th>
                                
                                <th> @if($reportType == 'year_comparison')
                                    Tinan {{ $comparisonYear }}
                                @else
                                     {{ $comparisonMonth }} {{ $year }}
                                @endif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $allMethods = collect($currentPaymentMethods)
                                ->merge($comparisonPaymentMethods)
                                ->unique('naran')
                                ->sortBy('naran');
                                
                            $currentPaymentTotal = 0;
                            $comparisonPaymentTotal = 0;
                            @endphp
                            
                            @foreach($allMethods as $method)
                                @php
                                    $current = collect($currentPaymentMethods)->firstWhere('naran', $method['naran']);
                                    $comparison = collect($comparisonPaymentMethods)->firstWhere('naran', $method['naran']);
                                    
                                    $currentMethodTotal = $current['total'] ?? 0;
                                    $comparisonMethodTotal = $comparison['total'] ?? 0;
                                    
                                    $currentPaymentTotal += $currentMethodTotal;
                                    $comparisonPaymentTotal += $comparisonMethodTotal;
                                @endphp
                                <tr>
                                    <td>{{ $method['naran'] }}</td>
                                    <td>${{ number_format($currentMethodTotal, 2, ',', '.') }}</td>
                                    <td>${{ number_format($comparisonMethodTotal, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold">
                            <tr>
                                <td>Total</td>
                                <td>${{ number_format($currentPaymentTotal, 2, ',', '.') }}</td>
                                <td>${{ number_format($comparisonPaymentTotal, 2, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <!-- Fulan/Tinan hahu -->
                <h5 class="mb-3">
                    Detallu Likidasaun 
                    @if($reportType == 'year_comparison')
                        Tinan {{ $currentYear }}
                    @else
                        Fulan {{ $month }} Tinan {{ $year }}
                    @endif
                </h5>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Data</th>
                                <th>Naran</th>
                                <th>Deskrisaun</th>
                                <th>Metodu Pagamentu</th>
                                <th class="text-right">Montante ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $currentPeriodTotal = 0;
                            @endphp
                            @foreach($currentData as $likidasaun)
                            @php
                                $currentPeriodTotal += $likidasaun->montante;
                            @endphp
                            <tr>
                                <td>{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                                <td>{{ $likidasaun->naran }}</td>
                                <td>{{ $likidasaun->deskrisaun }}</td>
                                <td>{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                                <td class="text-right">${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold">
                            <tr>
                                <td colspan="4" class="text-center">Total</td>
                                <td class="text-right">${{ number_format($currentPeriodTotal, 2, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Tinan/fulan komparasaun -->
                <h5 class="mb-3">
                    Detallu Likidasaun 
                    @if($reportType == 'year_comparison')
                        Tinan {{ $comparisonYear }}
                    @else
                        Fulan {{ $comparisonMonth }} Tinan {{ $year }}
                    @endif
                </h5>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Data</th>
                                <th>Naran</th>
                                <th>Deskrisaun</th>
                                <th>Metodu Pagamentu</th>
                                <th class="text-right">Montante ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $comparisonPeriodTotal = 0;
                            @endphp
                            @foreach($comparisonData as $likidasaun)
                            @php
                                $comparisonPeriodTotal += $likidasaun->montante;
                            @endphp
                            <tr>
                                <td>{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                                <td>{{ $likidasaun->naran }}</td>
                                <td>{{ $likidasaun->deskrisaun }}</td>
                                <td>{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                                <td class="text-right">${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold">
                            <tr>
                                <td colspan="4" class="text-center">Total</td>
                                <td class="text-right">${{ number_format($comparisonPeriodTotal, 2, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="mt-4 d-print-none button-container">
                <a href="{{ route('likidasaun.report') }}" class="btn btn-secondary mr-2">
                    <i class="fas fa-arrow-left mr-1"></i> Fila
                </a>
                <button class="btn btn-danger" id="generate-pdf">
                    <i class="fas fa-file-pdf mr-1"></i> PDF
                </button>
                <button class="btn btn-primary" id="save-doc">
                    <i class="fas fa-file-word mr-1"></i> Word
                </button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('generate-pdf').addEventListener('click', function() {
        const button = this;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Prosesu...';
        button.disabled = true;
        
        const noPrintElements = document.querySelectorAll('.d-print-none, .normal-display');
        noPrintElements.forEach(el => el.style.display = 'none');
        
        document.getElementById('export-only').style.display = 'block';
        
        const element = document.getElementById('report-content');
        
        const style = document.createElement('style');
        style.innerHTML = `
            @page { 
                margin: 15mm 10mm;
                size: A4 portrait;
            }
            body { 
                font-family: Arial, sans-serif; 
                font-size: 10pt;
                line-height: 1.4;
                color: #333;
            }
            .export-header {
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
                padding-bottom: 10px;
            }
            table { 
                width: 100%; 
                border-collapse: collapse; 
                margin: 10px 0;
                page-break-inside: avoid;
            }
            th, td { 
                border: 1px solid #ddd; 
                padding: 6px;
            }
            th { 
                background-color: #f5f5f5; 
                font-weight: bold;
            }
            .text-right { 
                text-align: right; 
            }
            .footer-section {
                margin-top: 20px;
                padding-top: 10px;
                border-top: 1px solid #ddd;
                font-size: 9pt;
                text-align: center;
            }
            h5 {
                margin: 15px 0 10px 0;
                font-size: 11pt;
                font-weight: bold;
            }
        `;
        element.appendChild(style);
        
        const footer = document.createElement('div');
        footer.className = 'footer-section';
        footer.innerHTML = `
            <p>Sistema Jestaun Finanseiru</p>
            <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        `;
        element.appendChild(footer);
        
        html2canvas(element, {
            scale: 2,
            logging: false,
            useCORS: true,
            scrollY: -window.scrollY,
            windowWidth: document.documentElement.scrollWidth,
            windowHeight: document.documentElement.scrollHeight
        }).then(canvas => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');
            const imgData = canvas.toDataURL('image/png');
            const imgWidth = 210; 
            const pageHeight = 295; 
            const imgHeight = canvas.height * imgWidth / canvas.width;
            
            pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
            
            const reportType = "{{ $reportType ?? 'all' }}";
            const year = "{{ $year ?? date('Y') }}";
            const month = "{{ $month ?? '' }}";
            const currentYear = "{{ $currentYear ?? '' }}";
            const comparisonYear = "{{ $comparisonYear ?? '' }}";
            const comparisonMonth = "{{ $comparisonMonth ?? '' }}";
            
            let fileName = `Relatoriu_Komparasaun_Likidasaun_`;
            if(reportType == 'year_comparison') {
                fileName += `${currentYear}_vs_${comparisonYear}`;
            } else {
                fileName += `${month}_${year}_vs_${comparisonMonth}_${year}`;
            }
            fileName += `.pdf`;
            
            pdf.save(fileName);
            
            button.innerHTML = originalText;
            button.disabled = false;
            noPrintElements.forEach(el => el.style.display = '');
            document.getElementById('export-only').style.display = 'none';
            element.removeChild(style);
            element.removeChild(footer);
        }).catch(error => {
            console.error('Error generating PDF:', error);
            button.innerHTML = originalText;
            button.disabled = false;
            noPrintElements.forEach(el => el.style.display = '');
            document.getElementById('export-only').style.display = 'none';
            if (element.contains(style)) element.removeChild(style);
            if (element.contains(footer)) element.removeChild(footer);
            alert('Error. try again.');
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('save-doc').addEventListener('click', function () {
        const noPrintElements = document.querySelectorAll('.d-print-none, .normal-display, no-export');
        noPrintElements.forEach(el => el.style.display = 'none');
        
        document.getElementById('export-only').style.display = 'block';
        
        const element = document.getElementById('report-content');
        
        const footer = document.createElement('div');
        footer.className = 'footer-section';
        footer.innerHTML = `
            <p>Sistema Jestaun Finanseiru</p>
            <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        `;
        element.appendChild(footer);
        
        const content = element.innerHTML;
        
        const style = `
            <style>
                body { 
                    font-family: Arial, sans-serif; 
                    font-size: 10pt;
                    margin: 0;
                    padding: 0;
                    line-height: 1.4;
                    color: #333;
                }
                .export-header {
                    margin-bottom: 15px;
                    border-bottom: 1px solid #eee;
                    padding-bottom: 10px;
                }
                table { 
                    width: 100%; 
                    border-collapse: collapse; 
                    margin: 10px 0;
                }
                th, td { 
                    border: 1px solid #ddd; 
                    padding: 6px;
                }
                th { 
                    background-color: #f5f5f5; 
                    font-weight: bold;
                }
                .text-right { 
                    text-align: right; 
                }
                .footer-section {
                    margin-top: 20px;
                    padding-top: 10px;
                    border-top: 1px solid #ddd;
                    font-size: 9pt;
                    text-align: center;
                }
                h5 {
                    margin: 15px 0 10px 0;
                    font-size: 11pt;
                    font-weight: bold;
                }
            </style>
        `;
        
        const html = `
            <html>
                <head><meta charset="utf-8">${style}</head>
                <body>
                    ${content}
                </body>
            </html>
        `;
        
        const blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });
        
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        
        const reportType = "{{ $reportType ?? 'all' }}";
        const year = "{{ $year ?? date('Y') }}";
        const month = "{{ $month ?? '' }}";
        const currentYear = "{{ $currentYear ?? '' }}";
        const comparisonYear = "{{ $comparisonYear ?? '' }}";
        const comparisonMonth = "{{ $comparisonMonth ?? '' }}";
        
        let fileName = `Relatoriu_Komparasaun_Likidasaun_`;
        if(reportType == 'year_comparison') {
            fileName += `${currentYear}_vs_${comparisonYear}`;
        } else {
            fileName += `${month}_${year}_vs_${comparisonMonth}_${year}`;
        }
        fileName += `.doc`;
        
        link.href = url;
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
        noPrintElements.forEach(el => el.style.display = '');
        document.getElementById('export-only').style.display = 'none';
        element.removeChild(footer);
    });
});
</script>   
    
<style>
    #export-only {
        display: none;
    }
    
    .normal-display .card {
        flex: 1 1 250px;
    }
    .normal-display .d-flex {
        gap: 15px;
    }
    
    .table th, .table td {
        vertical-align: middle;
        padding: 8px 12px;
    }
    
    tfoot {
        font-weight: bold;
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
    
    /* Print styles */
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
            margin: 0;
            padding: 0;
        }
        
        .normal-display {
            display: none !important;
        }
        
        #export-only {
            display: block !important;
        }
        
        .d-print-none {
            display: none !important;
        }
        
        .card {
            border: none !important;
            box-shadow: none !important;
        }
        
        .table {
            font-size: 9pt !important;
            width: 100% !important;
        }
        
        .footer-section {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
        }
    }
</style>
@endsection