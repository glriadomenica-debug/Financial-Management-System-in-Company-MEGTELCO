@extends('layouts.main')
{{-- report Fulan no Tinan --}}
@section('container')
<div class="container mt-4" id="report-content">
    <div class="card shadow">
        <div class="card-body">
            <!-- export only -->
            <div id="export-only" style="display: none;">
                <div class="export-header">
                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                        <div style="margin-right: 15px;">
                            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="height: 40px; width: 40px; object-fit: contain;">
                        </div>
                        <div>
                            <h2 style="margin: 0; color: #0d6efd; font-size: 16pt;">MEGTELCO S.A</h2>
                            <p style="margin: 0; font-size: 9pt;">Relatoriu Likidasaun</p>
                        </div>
                    </div>
                    <div style="text-align: right; font-size: 8pt;">
                        <p style="margin: 0;">Data: {{ date('d/m/Y') }}</p>
                        <p style="margin: 0;">{{ date('H:i') }}</p>
                    </div>
                    <h3 style="margin: 10px 0 15px 0; text-align: center; font-size: 12pt; font-weight: bold;">{{ $title }}</h3>
                </div>
                
                <!-- Summary tables for export -->
                <table class="export-table" style="width: 100%; margin-bottom: 15px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;" colspan="2">Total Likidasaun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left; width: 70%;">Total Likidasaun</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right; width: 30%;">${{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                
                <table class="export-table" style="width: 100%; margin-bottom: 15px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 6px; background-color: #f5f5f5; text-align: left;" colspan="3">Total Selu husi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['payment_methods'] as $method)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: left; width: 50%;">{{ $method['naran'] }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right; width: 25%;">${{ number_format($method['total'], 2, ',', '.') }}</td>
                            <td style="border: 1px solid #ddd; padding: 6px; text-align: right; width: 25%;">{{ round(($method['total'] / $stats['total_likidasaun']) * 100, 2) }}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Main data table for export -->
                <h4 style="margin: 15px 0 10px 0; font-size: 11pt;">Detallu Likidasaun</h4>
                <table class="export-data-table" style="width: 100%; margin-bottom: 15px; border-collapse: collapse; font-size: 9pt;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 5px; background-color: #f5f5f5; text-align: left;">Data</th>
                            <th style="border: 1px solid #ddd; padding: 5px; background-color: #f5f5f5; text-align: left;">Naran</th>
                            <th style="border: 1px solid #ddd; padding: 5px; background-color: #f5f5f5; text-align: left;">Deskrisaun</th>
                            <th style="border: 1px solid #ddd; padding: 5px; background-color: #f5f5f5; text-align: left;">Metodu Pagamentu</th>
                            <th style="border: 1px solid #ddd; padding: 5px; background-color: #f5f5f5; text-align: right;">Invoice/fulan($)</th>
                            <th style="border: 1px solid #ddd; padding: 5px; background-color: #f5f5f5; text-align: right;">Montante Selu($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $likidasaun)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: left;">{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: left;">{{ $likidasaun->naran }}</td>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: left;">{{ $likidasaun->deskrisaun }}</td>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: left;">{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: right;">${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: right;">${{ number_format($likidasaun->selu, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="border: 1px solid #ddd; padding: 5px; text-align: left; font-weight: bold;">
                                @if($reportType == 'annual')
                                Total Expected Income {{ $year }}
                                @elseif($reportType == 'monthly')
                                Total Expected Income {{ $month }}
                                @endif
                            </td>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: right; font-weight: bold;">${{ number_format($stats['total_montante'], 2, ',', '.') }}</td>
                            <td style="border: 1px solid #ddd; padding: 5px;"></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="border: 1px solid #ddd; padding: 5px; text-align: left; font-weight: bold;">
                                @if($reportType == 'annual')
                                Total Selu ona Pakote Internet Tinan {{ $year }}
                                @elseif($reportType == 'monthly')
                                Total Selu ona Pakote Internet Fulan {{ $month }}
                                @endif
                            </td>
                            <td style="border: 1px solid #ddd; padding: 5px; text-align: right; font-weight: bold;">${{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="normal-display">
                <div class="d-flex flex-wrap mb-4">
                    <div class="card bg-light mr-3 mb-3 flex-fill" style="min-width: 250px; max-width: 300px;">
                        <div class="card-body text-center">
                            <h6 class="card-title">Total Likidasaun</h6>
                            <h4 class="text-primary">${{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</h4>
                        </div>
                    </div>
                    @foreach($stats['payment_methods'] as $method)
                    <div class="card bg-light mr-3 mb-3 flex-fill" style="min-width: 250px; max-width: 300px;">
                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $method['naran'] }}</h6>
                            <h4 class="text-primary">${{ number_format($method['total'], 2, ',', '.') }}</h4>
                            <small class="text-muted">{{ round(($method['total'] / $stats['total_likidasaun']) * 100, 2) }}% husi total</small>
                        </div>
                    </div>
                    @endforeach
                </div>

                <h5 class="mb-3 mt-4">Detallu Likidasaun</h5>
                @if($reportType == 'annual')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 15%; text-align: left">Data</th>
                                <th style="width: 20%; text-align: left">Naran</th>
                                <th style="width: 30%; text-align: left">Deskrisaun</th>
                                <th style="width: 20%; text-align: left">Metodu Pagamentu</th>
                                <th style="width: 15%; text-align: right">Invoice/fulan($)</th>
                                <th style="width: 15%; text-align: right">Montante Selu($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $likidasaun)
                            <tr>
                                <td style="text-align: left">{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                                <td style="text-align: left">{{ $likidasaun->naran }}</td>
                                <td style="text-align: left">{{ $likidasaun->deskrisaun }}</td>
                                <td style="text-align: left">{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                                <td style="text-align: right">${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                                <td style="text-align: right">${{ number_format($likidasaun->selu, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold">
                            <tr>
                                <td colspan="4" style="text-align: left">Total Expected Income {{ $year }}</td>
                                <td style="text-align: right">${{ number_format($stats['total_montante'], 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: left">Total Selu ona Pakote Internet Tinan {{ $year }}</td>
                                <td style="text-align: right">${{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</td>
                            </tr>                        
                        </tfoot>
                    </table>
                </div>
                @elseif($reportType == 'monthly')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 15%; text-align: left">Data</th>
                                <th style="width: 20%; text-align: left">Naran</th>
                                <th style="width: 30%; text-align: left">Deskrisaun</th>
                                <th style="width: 20%; text-align: left">Metodu Pagamentu</th>
                                <th style="width: 15%; text-align: right">Invoice/fulan($)</th>
                                <th style="width: 15%; text-align: right">Montante Selu($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $likidasaun)
                            <tr>
                                <td style="text-align: left">{{ date('d/m/Y', strtotime($likidasaun->data_likidasaun)) }}</td>
                                <td style="text-align: left">{{ $likidasaun->naran }}</td>
                                <td style="text-align: left">{{ $likidasaun->deskrisaun }}</td>
                                <td style="text-align: left">{{ $likidasaun->metoduPagamentu->metodu_selu }}</td>
                                <td style="text-align: right">${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                                <td style="text-align: right">${{ number_format($likidasaun->selu, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold">
                            <tr>
                                <td colspan="4" style="text-align: left">Total Expected Income {{ $month }}</td>
                                <td style="text-align: right">${{ number_format($stats['total_montante'], 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: left">Total Selu ona Pakote Internet Fulan {{ $month }}</td>
                                <td style="text-align: right">${{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</td>
                            </tr>                       
                        </tfoot>
                    </table>
                </div>
                @endif
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
        
        // Hide elements not needed in export
        document.querySelectorAll('.normal-display, .d-print-none').forEach(el => el.style.display = 'none');
        document.getElementById('export-only').style.display = 'block';
        
        const element = document.getElementById('report-content');
        
        // Add print-specific styles
        const style = document.createElement('style');
        style.innerHTML = `
            @page { 
                margin: 10mm;
                size: A4 portrait;
            }
            body { 
                font-family: Arial, sans-serif; 
                font-size: 9pt;
                line-height: 1.3;
                color: #333;
            }
            .export-header {
                margin-bottom: 10px;
                border-bottom: 1px solid #eee;
                padding-bottom: 5px;
            }
            table { 
                width: 100%; 
                border-collapse: collapse; 
                margin: 5px 0;
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            th, td { 
                border: 1px solid #ddd; 
                padding: 4px;
                font-size: 8pt;
            }
            th { 
                background-color: #f5f5f5; 
                font-weight: bold;
            }
            .text-right { 
                text-align: right; 
            }
            .footer-section {
                margin-top: 10px;
                padding-top: 5px;
                border-top: 1px solid #ddd;
                font-size: 8pt;
                text-align: center;
            }
        `;
        element.appendChild(style);
        
        // Add footer
        const footer = document.createElement('div');
        footer.className = 'footer-section';
        footer.innerHTML = `
            <p>Sistema Jestaun Finanseiru</p>
            <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        `;
        element.appendChild(footer);
        
        // Generate PDF with multiple pages if needed
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('p', 'mm', 'a4');
        const pageHeight = pdf.internal.pageSize.getHeight();
        const pageWidth = pdf.internal.pageSize.getWidth();
        const margin = 10; // mm
        
        html2canvas(element, {
            scale: 2,
            logging: false,
            useCORS: true,
            scrollY: 0,
            windowWidth: document.documentElement.scrollWidth,
            windowHeight: document.documentElement.scrollHeight
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const imgWidth = pageWidth - margin * 2;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;
            
            let heightLeft = imgHeight;
            let position = margin;
            let page = 1;
            
            pdf.addImage(imgData, 'PNG', margin, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
            
            // Add additional pages if content is too long
            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', margin, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
                page++;
            }
            
            const reportType = "{{ $reportType ?? 'all' }}";
            const year = "{{ $year ?? date('Y') }}";
            const month = "{{ $month ?? '' }}";
            pdf.save(`Relatoriu_Likidasaun_${reportType}_${year}${month ? '_'+month : ''}.pdf`);
            
            // Restore original state
            button.innerHTML = originalText;
            button.disabled = false;
            document.querySelectorAll('.normal-display, .d-print-none').forEach(el => el.style.display = '');
            document.getElementById('export-only').style.display = 'none';
            element.removeChild(style);
            element.removeChild(footer);
        }).catch(error => {
            console.error('Error generating PDF:', error);
            button.innerHTML = originalText;
            button.disabled = false;
            document.querySelectorAll('.normal-display, .d-print-none').forEach(el => el.style.display = '');
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
        document.querySelectorAll('.normal-display').forEach(el => el.style.display = 'none');
        const noPrintElements = document.querySelectorAll('.d-print-none, .normal-display');
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
        const fileName = `Relatoriu_Likidasaun_${reportType}_${year}${month ? '_'+month : ''}.doc`;
        
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