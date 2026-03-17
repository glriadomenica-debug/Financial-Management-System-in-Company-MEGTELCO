@extends('layouts.main')

@section('container')
<div class="container mt-4 report-content" id="printable-area">
    <!-- Header section -->
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h2>{{ $title }}</h2>
    </div>

    <!-- Cards section  -->
    <div class="row mb-4 no-export">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Kliente</h5>
                    <h3 class="card-text">{{ $stats['total_kliente'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Kliente Active</h5>
                    <h3 class="card-text">{{ $stats['active_kliente'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Kliente Inactive</h5>
                    <h3 class="card-text">{{ $stats['inactive_kliente'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Pakote Uzadu section -->
    <div class="row mb-4 no-export">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title">Pakote uzadu</h5>
                    <div class="row">
                        @php
                            $pakoteCounts = [];
                            $klienteList = $reportType == 'annual' 
                                ? collect($data)->flatten(1) 
                                : collect($data);
    
                            foreach ($klienteList as $kliente) {
                                $pakoteName = $kliente->pakote->pakote ?? 'Deskonesidu';
                                if (!isset($pakoteCounts[$pakoteName])) {
                                    $pakoteCounts[$pakoteName] = 0;
                                }
                                $pakoteCounts[$pakoteName]++;
                            }
                        @endphp
    
                        @foreach($pakoteCounts as $pakote => $count)
                            <div class="col-md-3">
                                <div class="mb-2">
                                    <strong>{{ $pakote }}:</strong> {{ $count }} kliente(s)
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main data table -->
    @if($reportType == 'annual')
        @foreach($data as $month => $klientes)
        <div class="card mb-4 avoid-break">
            <div class="card-header bg-secondary text-white">
                <h5>{{ $month }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th style="width:5%; min-width:30px">No.</th>
                                <th style="width:10%; min-width:80px">Nu. Referensia</th>
                                <th style="width:10%; min-width:80px">Data</th>
                                <th style="width:20%; min-width:120px">Klientes</th>
                                <th style="width:10%; min-width:80px">Nu. Telefone</th>
                                <th style="width:15%; min-width:100px">Pakote</th>
                                <th style="width:10%; min-width:80px">Presu Pakote</th>
                                <th style="width:10%; min-width:80px">Presu Instalasaun</th>
                                <th style="width:10%; min-width:80px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klientes as $kliente)
                            <tr class="avoid-break">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kliente->nu_ref }}</td>
                                <td>{{ \Carbon\Carbon::parse($kliente->data)->format('d-m-Y') }}</td>
                                <td>{{ $kliente->naran }}</td>
                                <td>{{ $kliente->nu_telfone }}</td>
                                <td>{{ $kliente->pakote->pakote ?? '-' }}</td>
                                <td>${{ number_format($kliente->presu_pakote, 2) }}</td>
                                <td>${{ number_format($kliente->presu_instalasaun, 2) }}</td>
                                <td>
                                    @if($kliente->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="card avoid-break">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th style="width:5%; min-width:30px">No.</th>
                                <th style="width:10%; min-width:80px">Nu. Referensia</th>
                                <th style="width:10%; min-width:80px">Data</th>
                                <th style="width:20%; min-width:120px">Kliente</th>
                                <th style="width:10%; min-width:80px">Nu. Telefone</th>
                                <th style="width:15%; min-width:100px">Pakote</th>
                                <th style="width:10%; min-width:80px">Presu Pakote</th>
                                <th style="width:10%; min-width:80px">Presu Instalasaun</th>
                                <th style="width:10%; min-width:80px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $kliente)
                            <tr class="avoid-break">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kliente->nu_ref }}</td>
                                <td>{{ \Carbon\Carbon::parse($kliente->data)->format('d-m-Y') }}</td>
                                <td>{{ $kliente->naran }}</td>
                                <td>{{ $kliente->nu_telfone }}</td>
                                <td>{{ $kliente->pakote->pakote ?? '-' }}</td>
                                <td>${{ number_format($kliente->presu_pakote, 2) }}</td>
                                <td>${{ number_format($kliente->presu_instalasaun, 2) }}</td>
                                <td>
                                    @if($kliente->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <div class="no-print">
        <button onclick="saveAsPDF()" class="btn btn-danger hide-in-pdf">
            <i class="fas fa-file-pdf"></i> PDF
        </button>
        <button onclick="saveAsWord()" class="btn btn-primary hide-in-pdf">
            <i class="fas fa-file-word"></i> Word
        </button>
        <a href="{{ route('kliente_pakote.report') }}" class="btn btn-secondary hide-in-pdf">
            <i class="fas fa-arrow-left"></i>Fila
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.1.0/docx.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function createHeader() {
        const header = document.createElement('div');
        header.style.display = 'flex';
        header.style.justifyContent = 'space-between';
        header.style.alignItems = 'center';
        header.style.marginBottom = '20px';
        header.style.borderBottom = '1px solid #ddd';
        header.style.paddingBottom = '10px';
        
        const logoContainer = document.createElement('div');
        logoContainer.style.display = 'flex';
        logoContainer.style.alignItems = 'center';
        logoContainer.innerHTML = `
            <div style="margin-right: 15px;">
                <img src="{{ asset('images/logo.png') }}" alt="Company Logo" 
                     style="height: 50px; width: 50px; object-fit: contain;">
            </div>
            <div>
                <h2 style="margin: 0; color: #0d6efd; font-size: 18pt;">MEGTELCO S.A</h2>
                <p style="margin: 0; font-size: 10pt;">Relatoriu Kliente Pakote</p>
            </div>
        `;
        
        const dateInfo = document.createElement('div');
        dateInfo.innerHTML = `
            <div style="text-align: right;">
                <p style="margin: 0; font-size: 9pt;">Data: ${new Date().toLocaleDateString()}</p>
                <p style="margin: 0; font-size: 9pt;">${new Date().toLocaleTimeString()}</p>
            </div>
        `;
        
        header.appendChild(logoContainer);
        header.appendChild(dateInfo);
        
        return header;
    }

    function createStatsTable() {
        const table = document.createElement('table');
        table.style.width = '80%';
        table.style.borderCollapse = 'collapse';
        table.style.marginBottom = '20px';
        table.style.fontSize = '10pt';
        
        const thead = document.createElement('thead');
        thead.innerHTML = `
            <tr>
                <th style="border: 1px solid #ddd; padding: 4px; background-color: #0d6efd; color: white; text-align: center;">Total Kliente</th>
                <th style="border: 1px solid #ddd; padding: 4px; background-color: #0dcaf0; color: white; text-align: center;">Kliente Active</th>
                <th style="border: 1px solid #ddd; padding: 4px; background-color: #ffc107; color: black; text-align: center;">Kliente Inactive</th>
            </tr>
        `;
        
        const tbody = document.createElement('tbody');
        tbody.innerHTML = `
            <tr>
                <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">{{ $stats['total_kliente'] }}</td>
                <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">{{ $stats['active_kliente'] }}</td>
                <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">{{ $stats['inactive_kliente'] }}</td>
            </tr>
        `;
        
        table.appendChild(thead);
        table.appendChild(tbody);
        return table;
    }

    function createPakoteTable() {
        @php
            $pakoteCounts = [];
            $klienteList = $reportType == 'annual' 
                ? collect($data)->flatten(1) 
                : collect($data);

            foreach ($klienteList as $kliente) {
                $pakoteName = $kliente->pakote->pakote ?? 'Deskonesidu';
                if (!isset($pakoteCounts[$pakoteName])) {
                    $pakoteCounts[$pakoteName] = 0;
                }
                $pakoteCounts[$pakoteName]++;
            }
            
            arsort($pakoteCounts);
        @endphp

        const table = document.createElement('table');
        table.style.width = '80%';
        table.style.borderCollapse = 'collapse';
        table.style.marginBottom = '20px';
        table.style.fontSize = '10pt';
        
        // Create table header
        const thead = document.createElement('thead');
        thead.innerHTML = `
            <tr>
                <th colspan="3" style="border: 1px solid #ddd; padding: 4px; background-color: #f2f2f2; text-align: center;">
                    PAKOTE UZADU
                </th>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 4px; background-color: #6c757d; color: white; text-align: center;">No.</th>
                <th style="border: 1px solid #ddd; padding: 4px; background-color: #6c757d; color: white; text-align: center;">Naran Pakote</th>
                <th style="border: 1px solid #ddd; padding: 4px; background-color: #6c757d; color: white; text-align: center;">Total Kliente</th>
            </tr>
        `;
        
        const tbody = document.createElement('tbody');
        
        @foreach($pakoteCounts as $pakote => $count)
            const row{{ $loop->index }} = document.createElement('tr');
            row{{ $loop->index }}.innerHTML = `
                <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">{{ $loop->iteration }}</td>
                <td style="border: 1px solid #ddd; padding: 4px;">{{ $pakote }}</td>
                <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">{{ $count }}</td>
            `;
            tbody.appendChild(row{{ $loop->index }});
        @endforeach
        
        table.appendChild(thead);
        table.appendChild(tbody);
        return table;
    }
    
    function saveAsPDF() {

        const element = document.getElementById('printable-area').cloneNode(true);
   
        const elementsToHide = element.querySelectorAll('.no-print, .no-export, .hide-in-pdf');
        elementsToHide.forEach(el => el.style.display = 'none');
       
        const exportSections = element.querySelectorAll('.no-export');
        exportSections.forEach(el => el.remove());

        //button aktiv inactive ba text
        const badges = element.querySelectorAll('.badge');
        badges.forEach(badge => {
            const statusText = badge.textContent.trim();
            const plainText = document.createElement('span');
            plainText.textContent = statusText;
            badge.parentNode.replaceChild(plainText, badge);
        });
            
        const header = createHeader();
        element.insertBefore(header, element.firstChild);
        
        const statsTable = createStatsTable();
        header.parentNode.insertBefore(statsTable, header.nextSibling);
        
        const pakoteTable = createPakoteTable();
        statsTable.parentNode.insertBefore(pakoteTable, statsTable.nextSibling);
        
        // Create footer
        // const footer = document.createElement('div');
        // footer.style.marginTop = '20px';
        // footer.style.paddingTop = '10px';
        // footer.style.borderTop = '1px solid #ddd';
        // footer.style.textAlign = 'center';
        // footer.style.fontSize = '9pt';
        // footer.innerHTML = `
        //     <p>Sistema Jestaun Kliente Pakote</p>
        //     <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        // `;
        // element.appendChild(footer);
        
        const style = document.createElement('style');
        style.innerHTML = `
            @page {
                size: A4 landscape;
                margin: 10mm;
            }
            
            body {
                font-family: Arial, sans-serif;
                font-size: 9pt;
                line-height: 1.3;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            .container {
                width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            
            table {
                width: 100% !important;
                font-size: 8pt !important;
                table-layout: fixed !important;
                border-collapse: collapse !important;
                page-break-inside: avoid !important;
            }
            
            th, td {
                padding: 3px !important;
                border: 1px solid #ddd !important;
                word-wrap: break-word !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
            
            tr {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
            
            .card {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-bottom: 15px !important;
            }
            
            .card-header {
                background-color: #6c757d !important;
                color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .table-responsive {
                overflow: visible !important;
                width: 100% !important;
            }
            
            .avoid-break {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }
            
            .badge {
                color: white !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        `;
        element.appendChild(style);
        
        const opt = {
            margin: [10, 10, 10, 10],
            filename: 'relatoriu_kliente_pakote.pdf',
            image: { 
                type: 'jpeg', 
                quality: 0.98 
            },
            html2canvas: { 
                scale: 2,
                letterRendering: true,
                useCORS: true,
                scrollX: 0,
                scrollY: 0,
                allowTaint: true,
                timeout: 30000,
                logging: true
            },
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'landscape',
                compress: true
            },
            pagebreak: { 
                mode: ['avoid-all', 'css'],
                avoid: ['.avoid-break', 'tr', 'td', 'th']
            }
        };
        
        setTimeout(() => {
            html2pdf()
                .set(opt)
                .from(element)
                .save()
                .then(() => {
                    Swal.close();
                })
                .catch(err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Export Failed',
                        text: 'Error!!! Koko fila fali..',
                        footer: `Error: ${err.message}`
                    });
                });
        }, 500);
    }

    function saveAsWord() {
        const elementsToHide = document.querySelectorAll('.no-print, .no-export, .hide-in-pdf');
        elementsToHide.forEach(el => el.style.display = 'none');
        
        const element = document.getElementById('printable-area').cloneNode(true);
        
        const cardsSection = element.querySelector('.no-export');
        if (cardsSection) {
            cardsSection.remove();
        }
        
        const header = createHeader();
        element.insertBefore(header, element.firstChild);
        
        const statsTable = createStatsTable();
        header.parentNode.insertBefore(statsTable, header.nextSibling);
        
        const pakoteTable = createPakoteTable();
        statsTable.parentNode.insertBefore(pakoteTable, statsTable.nextSibling);
        
        const footer = document.createElement('div');
        footer.style.marginTop = '20px';
        footer.style.paddingTop = '10px';
        footer.style.borderTop = '1px solid #ddd';
        footer.style.textAlign = 'center';
        footer.style.fontSize = '9pt';
        footer.innerHTML = `
            <p>Sistema Jestaun Kliente Pakote</p>
            <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        `;
        element.appendChild(footer);
        
        const html = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <style>
                    body { 
                        font-family: Arial, sans-serif; 
                        font-size: 11pt; 
                        margin: 1cm;
                    }
                    .header { 
                        display: flex; 
                        justify-content: space-between; 
                        align-items: center;
                        margin-bottom: 20px;
                        border-bottom: 1px solid #ddd;
                        padding-bottom: 10px;
                    }
                    .header img {
                        height: 50px;
                        width: 50px;
                    }
                    .header-text {
                        margin-left: 15px;
                    }
                    .header-text h2 {
                        margin: 0;
                        color: #0d6efd;
                    }
                    table { 
                        border-collapse: collapse; 
                        width: 100%; 
                        margin-bottom: 20px; 
                        font-size: 10pt;
                    }
                    th, td { 
                        border: 1px solid #ddd; 
                        padding: 8px; 
                        text-align: left; 
                    }
                    th { 
                        background-color: #f2f2f2; 
                        font-weight: bold;
                    }
                    .footer { 
                        margin-top: 20px; 
                        text-align: center; 
                        font-size: 9pt; 
                        border-top: 1px solid #ddd;
                        padding-top: 10px;
                    }
                    .badge { 
                        padding: 3px 6px; 
                        border-radius: 3px; 
                        font-size: 12px; 
                        color: white; 
                    }
                    .bg-success { background-color: #28a745; }
                    .bg-danger { background-color: #dc3545; }
                    .stats-table th {
                        color: white;
                        text-align: center;
                    }
                    .stats-table td {
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                ${element.innerHTML}
            </body>
            </html>
        `;
        
        const blob = new Blob(['\ufeff', html], {
            type: 'application/msword'
        });
        
        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = 'relatoriu_kliente_pakote.doc';
        
        document.body.appendChild(link);
        link.click();
        
        setTimeout(() => {
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
            elementsToHide.forEach(el => el.style.display = '');
        }, 100);
    }
</script>
    
<style>
    .container {
        width: 100%;
        max-width: 1200px;
        padding: 0 15px;
        margin: 0 auto;
    }
    .card {
        transition: all 0.3s ease;
        border-radius: 10px;
        border-top: 4px solid transparent;
        margin-bottom: 1rem;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .card-body {
        padding: 1.25rem;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
        font-size: 0.9rem;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    @media print {
        @page {
            size: A4 landscape;
            margin: 10mm;
        }        
        body {
            font-size: 10pt;
            color: #000;
            background-color: #fff !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .container {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        table {
            page-break-inside: auto;
            break-inside: auto;
            table-layout: auto;
            font-size: 8pt !important;
            width: 100% !important;
        }
        
        tr {
            page-break-inside: avoid;
            break-inside: avoid;
        }
        
        td, th {
            padding: 3px !important;
            white-space: normal !important;
            overflow: visible !important;
            word-wrap: break-word !important;
        }

        .card {
            border: none !important;
            box-shadow: none !important;
            page-break-inside: avoid;
            break-inside: avoid;
            margin-bottom: 10px !important;
        }

        .no-print, .no-export, .hide-in-pdf {
            display: none !important;
        }

        .table-responsive {
            overflow: visible !important;
            display: block !important;
        }
        
        .badge {
            color: white !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
    /* Background colors */
    .bg-primary { background-color: #0d6efd !important; }
    .bg-info { background-color: #0dcaf0 !important; }
    .bg-warning { background-color: #ffc107 !important; }
    .bg-success { background-color: #198754 !important; }
    .bg-danger { background-color: #dc3545 !important; }
    .bg-secondary { background-color: #6c757d !important; }
    .bg-light { background-color: #f8f9fa !important; }

    /* Text colors for light backgrounds */
    .bg-warning, .bg-light {
        color: #000 !important;
    }

    /* Badge styles */
    .badge {
        display: inline-block;
        padding: 0.35em 0.65em;
        font-size: 0.75em;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }
    
    /* Page break handling */
    .avoid-break {
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }
</style>

@endsection