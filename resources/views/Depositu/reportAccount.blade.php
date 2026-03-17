@extends('layouts.main')

{{-- report view ba HTM no brangkas --}}
@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white no-print">
            <h5 class="mb-0">📊 {{ $title }}</h5>
        </div>

        <div class="card-body">
            <div id="export-only" style="display: none;">
                <div class="export-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                    <div style="display: flex; align-items: center;">
                        <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="height: 50px; margin-right: 15px;">
                        <div>
                            <h3 style="margin: 0; color: #0d6efd;">MEGTELCO S.A</h3>
                            <p style="margin: 0; font-size: 14px; color: #6c757d;">Relatoriu Movimentu {{ $accountName }}</p>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <p style="margin: 0; font-size: 12px;">Data: {{ date('d/m/Y') }}</p>
                        {{-- <p style="margin: 0; font-size: 12px;">Oras: {{ date('H:i') }}</p> --}}
                    </div>
                </div>
            </div>

            <form action="{{ route('depositu.report'.$accountName) }}" method="GET" class="mb-4 no-print">
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
                        <label for="year" class="form-label">📅 Tinan *</label>
                        <select class="form-control" id="year" name="year" required>
                            <option value="">-- Hili Tinan --</option>
                            @for($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success">🔍 Haree relatoriu</button>
                        <a href="{{ route('depositu.report'.$accountName) }}" class="btn btn-danger ms-2">🔄 Reset</a>
                        <a href="{{ route('depositu.hareDepositu') }}" class="btn btn-secondary mr-2">
                            <i class="fas fa-arrow-left mr-1"></i> Fila 
                        </a>
                    </div>
                </div>
            </form>
            
            @if(request()->has('year'))
                @if(count($transactions) > 0)
                    <div class="d-flex justify-content-between mb-3 no-export">
                        <h5>Movimentu {{ $accountName }}</h5>
                        <div class="button-container">
                            <button id="generate-pdf" class="btn btn-danger mr-2">
                                <i class="fas fa-file-pdf"></i> PDF
                            </button>
                            <button id="generate-word" class="btn btn-primary mr-2">
                                <i class="fas fa-file-word"></i> Word
                            </button>
                            {{-- <button onclick="window.print()" class="btn btn-info">
                                <i class="fas fa-print"></i> Print
                            </button> --}}
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="report-table"class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 12%;">Data</th>
                                    <th style="width: 23%;">Tipu Transasaun</th>
                                    <th style="width: 15%;">Montante</th>
                                    <th style="width: 15%;">Total Kreditu</th>
                                    <th style="width: 15%;">Total Debitu</th>
                                    <th style="width: 15%;">Balansu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $trx)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($trx['data'])->format('d-m-Y') }}</td>
                                        <td>
                                            <span class="{{ $trx['debit'] > 0 ? 'text-danger' : 'text-success' }}">
                                                {{ $trx['tipu_transasaun'] }}
                                            </span>
                                            @if($trx['deskrisaun'])
                                                <br><small>({{ $trx['deskrisaun'] }})</small>
                                            @endif
                                        </td>
                                        <td style="text-align: right;">${{ number_format($trx['montante'], 2) }}</td>
                                        <td style="text-align: right;" class="text-success">${{ number_format($trx['kreditu'], 2) }}</td>
                                        <td style="text-align: right;" class="text-danger">${{ number_format($trx['debit'], 2) }}</td>
                                        <td style="text-align: right;"><strong>${{ number_format($trx['balance'], 2) }}</strong></td>
                                    </tr>
                                @endforeach
                                <!-- Totals Row -->
                                 <tr class="table-active">
                                    <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                                    <td style="text-align: right;" class="text-success"><strong>${{ number_format($totalKreditu, 2) }}</strong></td>
                                    <td style="text-align: right;" class="text-danger"><strong>${{ number_format($totalDebitu, 2) }}</strong></td>
                                    <td style="text-align: right;" class="text-danger"><strong>${{ number_format($totalBalansu, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3 text-muted no-export">
                        <small>Relatoriu generadu iha: {{ now()->format('d-m-Y') }}</small>
                    </div>
                @else
                    <div class="alert alert-info no-export">
                       Dadus Ne'ebe Ita Hili Laiha!
                    </div>
                @endif
            @else
                <div class="alert alert-warning no-export">
                   Hili Tinan Atu Hare Relatoriu.
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.1.0/docx.min.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('generate-pdf').addEventListener('click', function() {
        const button = this;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Prosesu...';
        button.disabled = true;
        
        const noPrintElements = document.querySelectorAll('.no-print, .button-container');
        noPrintElements.forEach(el => el.style.display = 'none');
        
        document.getElementById('export-only').style.display = 'block';
        
        const element = document.querySelector('.card');
        
        const style = document.createElement('style');
        style.innerHTML = `
            @page { margin: 15mm 10mm; }
            body { font-family: Arial; font-size: 10pt; }
            .export-header { margin-bottom: 15px; }
            table { width: 100%; border-collapse: collapse; margin: 10px 0; }
            th, td { border: 1px solid #ddd; padding: 8px; }
            th { background-color: #343a40; color: white; }
            .text-success { color: #28a745 !important; }
            .text-danger { color: #dc3545 !important; }
            .footer { margin-top: 20px; padding-top: 10px; border-top: 1px solid #ddd; text-align: center; font-size: 9pt; }
        `;
        element.appendChild(style);
        
        // Create footer
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
            
            const month = "{{ request('month') ?? '' }}";
            const year = "{{ request('year') ?? '' }}";
            pdf.save(`Relatoriu_Movimentu_{{ $accountName }}_${year}${month ? '_'+month : ''}.pdf`);
            
            // Clean up
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
        
        const noPrintElements = document.querySelectorAll('.no-print, .button-container');
        noPrintElements.forEach(el => el.style.display = 'none');
        
        document.getElementById('export-only').style.display = 'block';
        
        const element = document.querySelector('.card');
        
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
                .export-header { margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
                table { width: 100%; border-collapse: collapse; margin: 10px 0; }
                th, td { border: 1px solid #ddd; padding: 8px; }
                th { background-color: #343a40; color: white; }
                .text-success { color: #28a745 !important; }
                .text-danger { color: #dc3545 !important; }
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
        const month = "{{ request('month') ?? '' }}";
        const year = "{{ request('year') ?? '' }}";
        const fileName = `Relatoriu_Movimentu_{{ $accountName }}_${year}${month ? '_'+month : ''}.doc`;
        
        link.href = url;
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        
        // Clean up
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
    /* Normal display styles */
    .button-container {
        display: flex;
        gap: 10px;
    }
    
    /* Print styles */
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
        .button-container {
            display: none !important;
        }
        #export-only {
            display: block !important;
        }
        .table {
            width: 100%;
            font-size: 12px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: white;
        }
    }
    
    /* Table styles */
    .table th, .table td {
        vertical-align: middle;
    }
    
    .table th {
        white-space: nowrap;
    }
    
    .text-success {
        color: #28a745 !important;
    }
    
    .text-danger {
        color: #dc3545 !important;
    }
    
    .mr-2 {
        margin-right: 0.5rem !important;
    }
    
    @media print {
        .text-success, .text-danger {
            color: inherit !important;
        }
    }
</style>
@endsection