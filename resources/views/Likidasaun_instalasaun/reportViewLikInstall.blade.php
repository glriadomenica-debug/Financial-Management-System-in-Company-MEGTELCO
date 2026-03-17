@extends('layouts.main')

@section('container')
<div class="container mt-4" id="report-content">
    <div class="card shadow">
        {{-- <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">📊 {{ $title }}</h5>
            </div>
        </div> --}}
        <div class="card-body">
            <!--  export only -->
            <div id="export-only" style="display: none;">
                <div class="export-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <div style="display: flex; align-items: center;">
                        <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="height: 50px; margin-right: 15px;">
                        <div>
                            <h3 style="margin: 0; color: #0d6efd;">MEGTELCO S.A</h3>
                            <p style="margin: 0; font-size: 14px; color: #6c757d;">Relatoriu Likidasaun Instalasaun</p>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <p style="margin: 0; font-size: 12px;">Data: {{ date('d/m/Y') }}</p>
                        <p style="margin: 0; font-size: 12px;">Oras: {{ date('H:i') }}</p>
                    </div>
                </div>

                <!-- show only for exporting -->
                <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #dee2e6; padding: 8px; background-color: #f8f9fa; text-align: left; width: 70%;">Total Likidasaun Instalasaun</th>
                            <th style="border: 1px solid #dee2e6; padding: 8px; background-color: #f8f9fa; text-align: right; width: 30%;">${{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</th>
                        </tr>
                    </thead>
                </table>

                <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th colspan="3" style="border: 1px solid #dee2e6; padding: 8px; background-color: #f8f9fa; text-align: left;">Total Selu husi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stats['payment_methods'] as $method)
                        <tr>
                            <td style="border: 1px solid #dee2e6; padding: 8px; text-align: left; width: 40%;">{{ $method['naran'] }}</td>
                            <td style="border: 1px solid #dee2e6; padding: 8px; text-align: right; width: 30%;">${{ number_format($method['total'], 2, ',', '.') }}</td>
                            <td style="border: 1px solid #dee2e6; padding: 8px; text-align: right; width: 30%;">{{ round(($method['total'] / $stats['total_likidasaun']) * 100, 2) }}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="normal-display">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6 class="card-title">Total Likidasaun Instalasaun</h6>
                                <h4 class="text-primary">${{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="mb-3">Total Selu husi </h5>
                <div class="row mb-4">
                    @foreach($stats['payment_methods'] as $method)
                    <div class="col-md-4 mb-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h6 class="card-title">{{ $method['naran'] }}</h6>
                                <h4 class="text-primary">${{ number_format($method['total'], 2, ',', '.') }}</h4>
                                <small class="text-muted">{{ round(($method['total'] / $stats['total_likidasaun']) * 100, 2) }}% husi total</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <h5 class="mb-3 mt-4">Detallu Likidasaun Instalasaun</h5>
            @if($reportType == 'annual')
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 15%; text-align: left">Data</th>
                            <th style="width: 20%; text-align: left">Naran</th>
                            <th style="width: 30%; text-align: left">Deskrisaun</th>
                            <th style="width: 20%; text-align: left">Metodu Pagamentu</th>
                            <th style="width: 15%; text-align: right">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $likidasaun)
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
                            <td colspan="4" style="text-align: left">Total Likidasaun Instalasaun Tinan {{ $year }}:</td>
                            <td style="text-align: right">{{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</td>
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
                            <th style="width: 15%; text-align: right">Montante ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $likidasaun)
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
                            <td colspan="4" style="text-align: left">Total Likidasaun Instalasaun Fulan {{ $month }}:</td>
                            <td style="text-align: right">{{ number_format($stats['total_likidasaun'], 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @endif

            <div class="mt-4 d-print-none button-container">
                <a href="{{ route('likidasaun_instalasaun.report') }}" class="btn btn-secondary mr-2">
                    <i class="fas fa-arrow-left mr-1"></i> Fila
                </a>
                <button class="btn btn-danger" id="generate-pdf">
                    <i class="fas fa-file-pdf mr-1"></i> PDF
                </button>
                <button class="btn btn-primary" id="generate-word">
                    <i class="fas fa-file-word mr-1"></i> Word
                </button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

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
            @page { margin: 15mm 10mm; }
            body { font-family: Arial; font-size: 10pt; }
            .export-header { margin-bottom: 15px; }
            table { width: 100%; border-collapse: collapse; margin: 10px 0; }
            th, td { border: 1px solid #ddd; padding: 8px; }
            th { background-color: #f8f9fa; font-weight: bold; }
            .text-right { text-align: right; }
            .footer { margin-top: 20px; padding-top: 10px; border-top: 1px solid #ddd; text-align: center; font-size: 9pt; }
        `;
        element.appendChild(style);
        
        const footer = document.createElement('div');
        footer.className = 'footer';
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
            pdf.save(`Relatoriu_Likidasaun_${reportType}_${year}${month ? '_'+month : ''}.pdf`);
            
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

    document.getElementById('generate-word').addEventListener('click', function() {
        const button = this;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Prosesu...';
        button.disabled = true;
        
        const noPrintElements = document.querySelectorAll('.d-print-none, .normal-display');
        noPrintElements.forEach(el => el.style.display = 'none');
        
        document.getElementById('export-only').style.display = 'block';
        
        const element = document.getElementById('report-content');
        
        const footer = document.createElement('div');
        footer.className = 'footer';
        footer.innerHTML = `
            <p>Sistema Jestaun Finanseiru</p>
            <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        `;
        element.appendChild(footer);
        
        const content = element.innerHTML;
        
        const style = `
            <style>
                body { font-family: Arial; font-size: 10pt; margin: 0; padding: 0; }
                .export-header { margin-bottom: 15px; }
                table { width: 100%; border-collapse: collapse; margin: 10px 0; }
                th, td { border: 1px solid #ddd; padding: 8px; }
                th { background-color: #f8f9fa; font-weight: bold; }
                .text-right { text-align: right; }
                .footer { margin-top: 20px; padding-top: 10px; border-top: 1px solid #ddd; text-align: center; font-size: 9pt; }
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
        button.innerHTML = originalText;
        button.disabled = false;
    });
});
</script>

<style>
    .normal-display .card {
        margin-bottom: 15px;
    }
    
    .button-container {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    
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
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
        }
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
</style>
@endsection