@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <!-- Normal View Header -->
        <div class="card-header bg-primary text-white no-export">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $title }}</h5>
                @if($pakote)
                    <span class="badge bg-secondary">Pakote: {{ $pakote }}</span>
                @endif
            </div>
        </div>

        <div class="card-body">

            <!-- Stats Summary - Hidden in exports -->
            <div class="row mb-4 no-export">
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Total Kliente</h6>
                            <p class="card-text h4">{{ $stats['total_klientes'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Kliente Selu Ona</h6>
                            <p class="card-text h4">{{ $stats['total_paid'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Kliente Seidauk Selu</h6>
                            <p class="card-text h4">{{ $stats['total_unpaid'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Total Devida</h6>
                            <p class="card-text h4">$ {{ number_format($stats['total_debt'], 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 no-export">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Total Invoice Fulan Ne'e</h6>
                            <p class="card-text h4">$ {{ number_format($stats['total_current_invoice'], 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Expected Income</h6>
                            <p class="card-text h4">$ {{ number_format($stats['total_expected_income'], 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-body">
                            <h6 class="card-title">Income</h6>
                            <p class="card-text h4">$ {{ number_format($stats['total_revenue'], 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Export version of stats (hidden by default) -->
            <div id="export-stats" style="display: none; margin-bottom: 20px;">
                <table class="table table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">Sumariu Estatistika</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Total Kliente:</strong> {{ $stats['total_klientes'] }}</td>
                            <td><strong>Kliente Selu Ona:</strong> {{ $stats['total_paid'] }}</td>
                            <td><strong>Kliente Seidauk Selu:</strong> {{ $stats['total_unpaid'] }}</td>
                            <td><strong>Total Devida:</strong> $ {{ number_format($stats['total_debt'], 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total Invoice Fulan Ne'e:</strong> $ {{ number_format($stats['total_current_invoice'], 2) }}</td>
                            <td><strong>Expected Income:</strong> $ {{ number_format($stats['total_expected_income'], 2) }}</td>
                            <td><strong>Income:</strong> $ {{ number_format($stats['total_revenue'], 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mb-3 no-export">
                <h5>Detalhu Kliente</h5>
                <div class="button-container">
                    <button id="generate-pdf" class="btn btn-danger mr-2">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                        {{-- <button id="generate-word" class="btn btn-primary mr-2">
                            <i class="fas fa-file-word"></i> Word
                        </button> --}}
                    <a href="{{ route('statuspagamentu.report') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Fila 
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="report-table" class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 3%;">No</th>
                            <th style="width: 7%;">Nu. Ref</th>
                            <th style="width: 15%;">Kliente</th>
                            <th style="width: 10%;">Pakote</th>
                            <th style="width: 8%;">New Installation</th>
                            <th style="width: 8%;">Outstanding</th> 
                            <th style="width: 8%;">Invoice/Fulan</th>
                            <th style="width: 8%;">Total Faktura</th>
                            <th style="width: 8%;">Selu ona (internet)</th>
                            <th style="width: 8%;">Data selu (internet)</th>
                            <th style="width: 8%;">Selu (Instalasaun)</th>
                            <th style="width: 8%;">Data selu (Instalasaun)</th>
                            <th style="width: 8%;">Iha devida</th>
                            <th style="width: 5%;">Status</th>
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
                        @endphp
                        @foreach($klientes as $index => $kliente)
                        @php
                            $rowClass = $kliente['is_paid'] ? 'table-success' : 'table-danger';
                            $totalNewInstall += $kliente['new_installation'] ?? 0;
                            $totalOutstanding += $kliente['outstanding'] ?? 0;
                            $totalCurrentInvoice += $kliente['current_invoice'] ?? 0;
                            $totalFakturaAll += $kliente['total_faktura'] ?? 0;
                            $totalSeluOna += $kliente['payment_amount'] ?? 0;
                            $totalInstallPayment += $kliente['install_payment'] ?? 0;
                            $totalDebt += $kliente['debt'] ?? 0;
                        @endphp
                        <tr class="{{ $rowClass }}">
                            <td class="row-number">{{ $index + 1 }}</td>
                            <td>{{ $kliente['nu_ref'] }}</td>
                            <td>{{ $kliente['naran'] }}</td>
                            <td>{{ $kliente['pakote'] }}</td>
                            <td style="text-align: right;">$ {{ number_format($kliente['new_installation'] ?? 0, 2) }}</td> 
                            <td style="text-align: right;">$ {{ number_format($kliente['outstanding'] ?? 0, 2) }}</td> 
                            <td style="text-align: right;">$ {{ number_format($kliente['current_invoice'] ?? 0, 2) }}</td>
                            <td style="text-align: right;">$ {{ number_format($kliente['total_faktura'] ?? 0, 2) }}</td>
                            <td style="text-align: right;">$ {{ number_format($kliente['payment_amount'] ?? 0, 2) }}</td>
                            <td>{{ $kliente['payment_date'] ?? '' }}</td>
                            <td style="text-align: right;">$ {{ number_format($kliente['install_payment'] ?? 0, 2) }}</td>
                            <td>{{ $kliente['install_date'] ?? '' }}</td>
                            <td style="text-align: right;">$ {{ number_format($kliente['debt'] ?? 0, 2) }}</td>
                            <td>
                                @if($kliente['is_paid'])
                                    <span class="badge bg-success">Selu Ona</span>
                                @else
                                    <span class="badge bg-danger">Seidauk Selu</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-active">
                        <tr>
                            <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                            <td style="text-align: right;"><strong>$ {{ number_format($totalNewInstall, 2) }}</strong></td>
                            <td style="text-align: right;"><strong>$ {{ number_format($totalOutstanding, 2) }}</strong></td>
                            <td style="text-align: right;"><strong>$ {{ number_format($totalCurrentInvoice, 2) }}</strong></td>
                            <td style="text-align: right;"><strong>$ {{ number_format($totalFakturaAll, 2) }}</strong></td>
                            <td style="text-align: right;"><strong>$ {{ number_format($totalSeluOna, 2) }}</strong></td>
                            <td>-</td>
                            <td style="text-align: right;"><strong>$ {{ number_format($totalInstallPayment, 2) }}</strong></td>
                            <td>-</td>
                            <td style="text-align: right;"><strong>$ {{ number_format($totalDebt, 2) }}</strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-3 text-muted no-export">
                <small>Relatoriu generadu iha: {{ now()->format('d-m-Y H:i:s') }}</small>
            </div>
        </div>
    </div>
</div>

<!-- Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.8.2/docx.js"></script>

<script>
document.getElementById('generate-pdf').addEventListener('click', function() {
    const button = this;
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Prosesu...';
    button.disabled = true;

    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF({
        orientation: 'landscape',
        unit: 'mm',
        format: 'a4'
    });

    // Margins and layout settings
    const margins = {
        left: 10,
        right: 10,
        top: 15,
        bottom: 20
    };
    const contentWidth = pdf.internal.pageSize.getWidth() - margins.left - margins.right;
    const contentHeight = pdf.internal.pageSize.getHeight() - margins.top - margins.bottom;

    // Header 
    const header = `
        <div style="text-align: center; margin-bottom: 15px;">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="height: 50px; margin-bottom: 10px;">
            <h2 style="margin: 5px 0; color: #0d6efd; font-size: 18pt;">MEGTELCO S.A</h2>
            <h3 style="margin: 5px 0; font-size: 16pt;">{{ $title }}</h3>
        </div>
        <div style="margin-bottom: 15px;">
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 10px; font-size: 9pt;">
                <tr>
                    <td style="padding: 6px; border: 1px solid #ddd;"><strong>Total Kliente:</strong> {{ $stats['total_klientes'] }}</td>
                    <td style="padding: 6px; border: 1px solid #ddd;"><strong>Kliente Selu Ona:</strong> {{ $stats['total_paid'] }}</td>
                    <td style="padding: 6px; border: 1px solid #ddd;"><strong>Kliente Seidauk Selu:</strong> {{ $stats['total_unpaid'] }}</td>
                    <td style="padding: 6px; border: 1px solid #ddd;"><strong>Total Devida:</strong> ${{ number_format($stats['total_debt'], 2) }}</td>
                </tr>
                <tr>
                    <td style="padding: 6px; border: 1px solid #ddd;"><strong>Total Invoice Fulan Ne'e:</strong> ${{ number_format($stats['total_current_invoice'], 2) }}</td>
                    <td style="padding: 6px; border: 1px solid #ddd;"><strong>Expected Income:</strong> ${{ number_format($stats['total_expected_income'], 2) }}</td>
                    <td style="padding: 6px; border: 1px solid #ddd;"><strong>Income:</strong> ${{ number_format($stats['total_revenue'], 2) }}</td>
                    <td style="padding: 6px; border: 1px solid #ddd;"></td>
                </tr>
            </table>
        </div>
    `;

    // Tables set
    const originalTable = document.getElementById('report-table');
    const originalRows = originalTable.querySelectorAll('tbody tr');
    const totalRows = originalRows.length;
    const footerRow = originalTable.querySelector('tfoot tr').cloneNode(true);
    
    const colWidths = {
        0: '3%',   // No
        1: '9%',   // Nu. Ref
        2: '15%',  // Kliente
        3: '10%',  // Pakote
        4: '8%',   // New Installation
        5: '8%',   // Outstanding
        6: '8%',   // Invoice/Fulan
        7: '8%',   // Total Faktura
        8: '8%',   // Selu ona (internet)
        9: '8%',   // Data selu (internet)
        10: '8%',  // Selu (Instalasaun)
        11: '8%',  // Data selu (Instalasaun)
        12: '8%',  // Iha devida
        13: '10%'   // Status
    };

    const createTableHeader = () => {
        const headerClone = originalTable.querySelector('thead').cloneNode(true);
        headerClone.querySelectorAll('th').forEach((th, index) => {
            th.style.padding = '6px 4px';
            th.style.border = '1px solid #555';
            th.style.backgroundColor = '#343a40';
            th.style.color = 'white';
            th.style.fontWeight = 'bold';
            th.style.textAlign = 'center';
            th.style.width = colWidths[index] || 'auto';
        });
        return headerClone;
    };


    const createTableRow = (row, rowNum) => {
        const newRow = row.cloneNode(true);
        const rowNumberCell = newRow.querySelector('.row-number');
        if (rowNumberCell) {
            rowNumberCell.textContent = rowNum;
            rowNumberCell.style.textAlign = 'center';
        }

          // selu ona no seidauk selu muda ba text
        const badges = newRow.querySelectorAll('.badge');
        badges.forEach(badge => {
            const statusText = badge.textContent.trim();
            const plainText = document.createElement('span');
            plainText.textContent = statusText;
            badge.parentNode.replaceChild(plainText, badge);
        });
        
        newRow.querySelectorAll('td').forEach((td, i) => {
            td.style.padding = '5px 4px';
            td.style.border = '1px solid #ddd';
            td.style.lineHeight = '1.2';
            td.style.wordWrap = 'break-word';
            td.style.width = colWidths[i] || 'auto';
            td.style.fontSize = '8pt';
            
            if ([4,5,6,7,8,10,12].includes(i)) {
                td.style.textAlign = 'right';
                td.style.fontFamily = 'monospace';
            }
            
            if (i === 13) {
                td.style.textAlign = 'center';
            }
        });
        
        newRow.style.backgroundColor = rowNum % 2 === 0 ? '#f8f9fa' : 'white';
        return newRow;
    };

    const createPageContainer = (pageNum, isLastPage = false) => {
        const container = document.createElement('div');
        container.style.padding = '15px';
        container.style.backgroundColor = 'white';
        container.style.width = '100%';
        container.style.boxSizing = 'border-box';
        container.style.fontFamily = 'Arial, sans-serif';
        
        container.innerHTML = header;
        
        const table = document.createElement('table');
        table.style.width = '100%';
        table.style.borderCollapse = 'collapse';
        table.style.fontSize = '9pt';
        table.style.tableLayout = 'fixed';
        
        table.appendChild(createTableHeader());
        
        const tbody = document.createElement('tbody');
        table.appendChild(tbody);
        
        if (isLastPage) {
            const tfoot = document.createElement('tfoot');
            const footerRowClone = footerRow.cloneNode(true);
            footerRowClone.querySelectorAll('td').forEach(td => {
                td.style.padding = '6px 4px';
                td.style.border = '1px solid #555';
                td.style.fontWeight = 'bold';
                td.style.backgroundColor = '#e9ecef';
            });
            tfoot.appendChild(footerRowClone);
            table.appendChild(tfoot);
        }
        
        container.appendChild(table);
        
        const pageFooter = document.createElement('div');
        pageFooter.style.marginTop = '10px';
        pageFooter.style.textAlign = 'center';
        pageFooter.style.fontSize = '9pt';
        pageFooter.style.color = '#6c757d';
        pageFooter.style.borderTop = '1px solid #eee';
        pageFooter.style.paddingTop = '8px';
        pageFooter.innerHTML = `
            <p>Sistema Jestaun Finanseiru - © ${new Date().getFullYear()} MEGTELCO S.A </p>
            <p>Relatoriu generadu iha: ${new Date().toLocaleString()}</p>
        `;
        
        container.appendChild(pageFooter);
        document.body.appendChild(container);
        
        return {
            container: container,
            tableBody: tbody
        };
    };

    const addPageToPdf = (element, pageNum) => {
        return new Promise((resolve) => {
            const options = {
                scale: 3,
                logging: true,
                useCORS: true,
                scrollY: 0,
                windowWidth: element.scrollWidth,
                windowHeight: element.scrollHeight,
                backgroundColor: '#FFFFFF',
                letterRendering: true,
                allowTaint: true,
                dpi: 300
            };

            html2canvas(element, options).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const imgWidth = contentWidth;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                
                if (pageNum > 1) {
                    pdf.addPage('l');
                }
                
                pdf.addImage(imgData, 'PNG', margins.left, margins.top, imgWidth, imgHeight);
                
                pdf.setFontSize(9);
                pdf.text(`Pájina ${pageNum}`, 
                    pdf.internal.pageSize.getWidth() - margins.right - 15, 
                    pdf.internal.pageSize.getHeight() - 10);
                pdf.text(``, 
                    margins.left + 15, 
                    pdf.internal.pageSize.getHeight() - 10);
                
                document.body.removeChild(element);
                resolve();
            });
        });
    };

    const generatePdf = async () => {
        let currentRow = 0;
        let pageNum = 1;
        
        const testPage = createPageContainer(1);
        const testRow = createTableRow(originalRows[0], 1);
        testPage.tableBody.appendChild(testRow);
        document.body.appendChild(testPage.container);
        
        await new Promise(resolve => setTimeout(resolve, 100));
        
        const rowHeight = testRow.offsetHeight;
        const headerHeight = testPage.container.querySelector('div').offsetHeight;
        const footerHeight = testPage.container.querySelector('div:last-child').offsetHeight;
        const availableHeight = contentHeight * 3.78 - headerHeight - footerHeight; 
        const rowsPerPage = Math.floor(availableHeight / rowHeight);
        
        document.body.removeChild(testPage.container);
        
        while (currentRow < totalRows) {
            const isLastPage = (currentRow + rowsPerPage) >= totalRows;
            const page = createPageContainer(pageNum, isLastPage);
            
            const endRow = Math.min(currentRow + rowsPerPage, totalRows);
            for (let i = currentRow; i < endRow; i++) {
                page.tableBody.appendChild(createTableRow(originalRows[i], i + 1));
            }
            
            await addPageToPdf(page.container, pageNum);
            
            currentRow = endRow;
            pageNum++;
        }
        
        pdf.save(`Relatoriu_Status_Pagamentu_{{ $month ?? '' }}_{{ $year ?? '' }}.pdf`);
        
        button.innerHTML = originalText;
        button.disabled = false;
    };

    generatePdf().catch(error => {
        console.error('PDF generation error:', error);
        button.innerHTML = originalText;
        button.disabled = false;
        alert('Erro durante genera PDF. Favor prova fali.');
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
        .no-export, .no-print {
            display: none !important;
        }
        #export-header, #export-stats {
            display: block !important;
        }
     #report-table {
            font-size: 10pt;
        }
        
        #report-table th, #report-table td {
            padding: 6px;
        }
        #report-table th {
            background-color: #343a40;
            color: white;
        }
        .text-success {
            color: #28a745 !important;
        }
        .text-danger {
            color: #dc3545 !important;
        }
    }
    
    /* Table styles */
     #report-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    
    #report-table th, #report-table td {
        padding: 10px;
        border: 1px solid #dee2e6;
        vertical-align: middle;
    }
    
    #report-table th {
        background-color: #343a40;
        color: white;
        font-weight: bold;
        text-align: center;
    }
    
    #report-table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    
    #report-table tbody tr:hover {
        background-color: #e9ecef;
    }

    
  /* Alignment for numbers */
    #report-table td:nth-child(5),
    #report-table td:nth-child(6),
    #report-table td:nth-child(7),
    #report-table td:nth-child(8),
    #report-table td:nth-child(9),
    #report-table td:nth-child(11),
    #report-table td:nth-child(13) {
        text-align: right;
        font-family: monospace;
    }
    
   .badge {
        padding: 5px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
    }
    .bg-success {
        background-color: #28a745 !important;
    }
    .bg-danger {
        background-color: #dc3545 !important;
    }
    .table-success {
        background-color: rgba(40, 167, 69, 0.1) !important;
    }
    .table-danger {
        background-color: rgba(220, 53, 69, 0.1) !important;
    }
</style>
@endsection