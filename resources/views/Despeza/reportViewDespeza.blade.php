@extends('layouts.main')

@section('container')
<div class="container mt-4" id="printable-area">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center mb-4 no-print">
                <h5 class="mb-0">{{ $title }}</h5>
            </div>
        </div>
        <div class="card-body">
            <div id="report-content">
                @if($reportType == 'annual')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="width: 100%; table-layout: auto;">                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 70%; text-align: left">Tipu Despeza</th>
                                <th style="width: 30%; text-align: right">Total Montante ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($expenseTypes as $type)
                                <tr>
                                    <td style="text-align: left">{{ $type['name'] }}</td>
                                    <td style="text-align: right">${{ number_format($type['total'], 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold">
                            <tr>
                                <td style="text-align: left">Total Gastus Annual {{ $year }}:</td>
                                <td style="text-align: right">${{ number_format($stats['total_despeza'], 2, ',', '.') }}</td>
                            </tr>
                            {{-- <tr>
                                <td style="text-align: left">Total Osan Tama:</td>
                                <td style="text-align: right">${{ number_format($stats['total_osan_tama'], 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Balansu:</td>
                                <td style="text-align: right">${{ number_format($stats['balansu'], 2, ',', '.') }}</td>
                            </tr> --}}
                        </tfoot>
                    </table>
                </div>
                @elseif($reportType == 'monthly')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="width: 100%; table-layout: auto;">                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 45%; text-align: left">Data</th>
                                <th style="width: 45%; text-align: left">Tipu Despeza</th>
                                <th style="width: 30%; text-align: right">Montante ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $expense)
                                <tr>
                                    <td style="text-align: left">{{ date('d/m/Y', strtotime($expense->data)) }}</td>
                                    <td style="text-align: left">{{ $expense->tipuTransaksaun->tipu_transaksaun }}</td>
                                    <td style="text-align: right">${{ number_format($expense->montante, 2, ',', '.') }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="font-weight-bold">
                            <tr>
                                <td style="text-align: left">Total Gastus:</td>
                                <td></td>

                                <td colspan= "3"style="text-align: right">${{ number_format($stats['total_despeza'], 2, ',', '.') }}</td>
                            </tr>
                            {{-- <tr>
                                <td style="text-align: left">Total Osan Tama:</td>
                                <td style="text-align: right">${{ number_format($stats['total_osan_tama'], 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Balansu:</td>
                                <td style="text-align: right">${{ number_format($stats['balansu'], 2, ',', '.') }}</td>
                            </tr> --}}
                        </tfoot>
                    </table>
                </div>
                @endif

                <div class="mt-4 d-print-none button-container">
                    <a href="{{ route('despeza.report') }}" class="btn btn-secondary mr-2">
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
</div>

<!-- jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.1.0/docx.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<script>
      function createFooter() {
        const footer = document.createElement('div');
        footer.style.marginTop = '20px';
        footer.style.paddingTop = '10px';
        footer.style.borderTop = '1px solid #ddd';
        footer.style.textAlign = 'center';
        footer.style.fontSize = '9pt';
        footer.innerHTML = `
            <p>Sistema Jestaun Finanseiru</p>
            <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        `;
        return footer;
    }
    function createHeader() {
    const title = document.querySelector('.card-header h5').textContent;
    
    const header = document.createElement('div');
    header.style.marginBottom = '15px';
    header.style.paddingBottom = '10px';
    header.style.borderBottom = '1px solid #eee';
    
    const companyInfo = document.createElement('div');
    companyInfo.style.display = 'flex';
    companyInfo.style.alignItems = 'center';
    companyInfo.style.marginBottom = '10px';
    companyInfo.innerHTML = `
        <div style="margin-right: 15px;">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" 
                 style="height: 50px; width: auto;">
        </div>
        <div>
            <h2 style="margin: 0; color: #0d6efd; font-size: 14pt;">MEGTELCO S.A</h2>
            <p style="margin: 3px 0 0 0; font-size: 10pt; color: #666;">Relatoriu Despeza</p>
        </div>
    `;
    
    const reportInfo = document.createElement('div');
    reportInfo.style.display = 'flex';
    reportInfo.style.justifyContent = 'space-between';
    reportInfo.style.alignItems = 'flex-end';
    reportInfo.innerHTML = `
        <div>
            <h3 style="margin: 0; font-size: 12pt;">${title}</h3>
        </div>
        <div style="text-align: right; font-size: 9pt; color: #666;">
            <p style="margin: 0;">Generated: ${new Date().toLocaleDateString()}</p>
            <p style="margin: 3px 0 0 0;">${new Date().toLocaleTimeString()}</p>
        </div>
    `;
    
    header.appendChild(companyInfo);
    header.appendChild(reportInfo);
    
    return header;
}

async function saveAsPDF() {
    const elementsToHide = document.querySelectorAll('.no-print, .button-container');
    elementsToHide.forEach(el => el.style.display = 'none');
    
    const element = document.getElementById('printable-area').cloneNode(true);
    element.querySelectorAll('.table-responsive').forEach(table => {
        table.classList.remove('table-responsive');
        table.style.overflow = 'visible';
    });

    const header = createHeader();
    const footer = createFooter();
    const printContainer = document.createElement('div');
    printContainer.style.width = '100%';
    printContainer.style.margin = '0';
    printContainer.style.padding = '0';
    printContainer.style.fontFamily = 'Arial, sans-serif';
    printContainer.appendChild(header);
    printContainer.appendChild(element.querySelector('.card-body').cloneNode(true));
    printContainer.appendChild(footer);
    
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0 15px 0;
            page-break-inside: auto;
        }
        th {
            background-color: #f8f9fa !important;
            font-weight: bold;
            text-align: left;
            padding: 6px;
            border: 1px solid #dee2e6;
        }
        td {
            padding: 6px;
            border: 1px solid #dee2e6;
            vertical-align: top;
        }
        .text-right {
            text-align: right;
        }
        .card {
            border: none;
            box-shadow: none;
        }
        .card-header {
            background-color: #f8f9fa !important;
            color: #333 !important;
            border-bottom: 1px solid #dee2e6;
        }
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 9pt;
            text-align: center;
        }
    `;
    printContainer.appendChild(style);
    
    const tempDiv = document.createElement('div');
    tempDiv.style.position = 'fixed';
    tempDiv.style.left = '-9999px';
    tempDiv.style.top = '0';
    tempDiv.appendChild(printContainer);
    document.body.appendChild(tempDiv);
    
    try {
        const opt = {
            margin: [15, 10], // margin: [top, left, bottom, right]
            filename: 'relatoriu_despeza.pdf',
            image: { 
                type: 'jpeg', 
                quality: 1 
            },
            html2canvas: { 
                scale: 2, 
                logging: false,
                useCORS: true,
                allowTaint: true,
                scrollX: 0,
                scrollY: 0,
                windowHeight: printContainer.scrollHeight + 50
            },
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'portrait',
                hotfixes: ["px_scaling"]
            },
            pagebreak: { 
                mode: ['avoid-all', 'css', 'legacy'],
                avoid: ['tr', 'th', 'td', '.card']
            }
        };
        
        await html2pdf().set(opt).from(printContainer).save();
    } catch (error) {
        console.error("Error generating PDF:", error);
        alert("Erro durante genera PDF: " + error.message);
    } finally {
        document.body.removeChild(tempDiv);
        elementsToHide.forEach(el => el.style.display = '');
    }
}

    async function saveAsWord() {
        const buttons = document.querySelectorAll('.no-print, .button-container');
        buttons.forEach(btn => btn.style.display = 'none');
        
        const element = document.getElementById('report-content').cloneNode(true);
        const title = document.querySelector('.card-header h5').textContent;
        
        const header = createHeader();
        const footer = createFooter();
        element.insertBefore(header, element.firstChild);
        element.appendChild(footer);
        
        const html = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <style>
                    body { 
                        font-family: Arial, sans-serif; 
                        font-size: 10pt; 
                        margin: 1.5cm;
                    }
                    .header { 
                        display: flex; 
                        flex-direction: column;
                        margin-bottom: 15px;
                        border-bottom: 1px solid #eee;
                        padding-bottom: 10px;
                    }
                    .header-top {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 8px;
                    }
                    .header-title {
                        text-align: center;
                        font-size: 12pt;
                        font-weight: bold;
                        margin: 5px 0 0 0;
                    }
                    table { 
                        border-collapse: collapse; 
                        width: 100%; 
                        margin: 10px 0 15px 0;
                        font-size: 9pt;
                    }
                    th, td { 
                        border: 1px solid #ddd; 
                        padding: 5px 7px;
                    }
                    .text-right {
                        text-align: right !important;
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
        link.download = 'relatoriu_despeza.doc';
        document.body.appendChild(link);
        link.click();
        
        setTimeout(() => {
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
            buttons.forEach(btn => btn.style.display = '');
        }, 100);
    }

    document.getElementById('generate-pdf').onclick = saveAsPDF;
    document.getElementById('generate-word').onclick = saveAsWord;
</script>
<style>
@media print {
    body {
        background: white !important;
        color: black !important;
        font-size: 10pt !important;
        line-height: 1.4 !important;
    }
    
    #printable-area {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    .card {
        border: none !important;
        box-shadow: none !important;
        background: transparent !important;
    }
    
    .card-header {
        background: #f8f9fa !important;
        color: #333 !important;
        border-bottom: 1px solid #ddd !important;
    }
    
    table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 10px 0 !important;
        page-break-inside: avoid !important;
    }
    
    th, td {
        border: 1px solid #ddd !important;
        padding: 6px !important;
        font-size: 9pt !important;
    }
    
    th {
        background-color: #f5f5f5 !important;
        font-weight: bold !important;
    }
    
    .no-print, .button-container {
        display: none !important;
    }
    
    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 9pt;
        padding: 10px 0;
        border-top: 1px solid #eee;
        background: white;
    }
    
    @page {
        size: A4 portrait;
        margin: 15mm 10mm;
    }
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
    border-bottom-width: 2px;
}

.text-right {
    text-align: right !important;
}
</style>
@endsection