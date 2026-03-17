@extends('layouts.main')

@section('container')
<div class="container mt-4">
   
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h2>{{ $title }}</h2>
        <div>
            {{-- <button onclick="printReport()" class="btn btn-light btn-sm no-export">
                <i class="fas fa-print"></i> Print
            </button> --}}
            <button onclick="saveAsPDF()" class="btn btn-danger no-export">
                <i class="fas fa-file-pdf"></i> PDF
            </button>
            <button onclick="saveAsWord()" class="btn btn-primary no-export ms-2">
                <i class="fas fa-file-word"></i> Word
            </button>
            <a href="{{ route('kliente.report') }}" class="btn btn-secondary no-export">
                <i class="fas fa-arrow-left"></i> Fila
            </a>
        </div>
    </div>

    <div class="row mb-4 g-4 printable-cards">
        @foreach([
            ['title' => 'TOTAL KLIENTE', 'value' => $stats['total_kliente'], 'icon' => 'users', 'color' => 'primary'],
            ['title' => 'KLIENTE FOUN', 'value' => $stats['new_this_period'], 'icon' => 'user-plus', 'color' => 'info'],
            ['title' => 'IHA EMAIL', 'value' => $stats['with_email'], 'icon' => 'envelope', 'color' => 'info'],
            ['title' => 'LAIHA EMAIL', 'value' => $stats['without_email'], 'icon' => 'envelope', 'color' => 'info'],
            ['title' => 'TIMORENSE', 'value' => $stats['total_timorense'], 'icon' => 'user-check', 'color' => 'success'],
            ['title' => 'ESTRANGEIRO', 'value' => $stats['total_estrangeiro'], 'icon' => 'globe-asia', 'color' => 'warning'],
            ['title' => 'TOTAL PRIVADU', 'value' => $stats['total_privadu'], 'icon' => 'building', 'color' => 'info'],
    ['title' => 'TOTAL PUBLIKU', 'value' => $stats['total_publiku'], 'icon' => 'university', 'color' => 'success']

        ] as $card)
        <div class="col-md-4 col-lg-2">
            <div class="card h-100 printable-card">
                <div class="card-body text-center p-3">
                    <div class="mb-2">
                        <i class="fas fa-{{ $card['icon'] }} fa-2x text-{{ $card['color'] }}"></i>
                    </div>
                    <h6 class="card-title mb-1">{{ $card['title'] }}</h6>
                    <h4 class="card-text fw-bold mb-1">{{ $card['value'] }}</h4>
                    @if(isset($card['growth']) && $stats['previous_period_count'] > 0)
                    <small class="{{ $card['growth'] >= 0 ? 'text-success' : 'text-danger' }}">
                        <i class="fas fa-arrow-{{ $card['growth'] >= 0 ? 'up' : 'down' }}"></i>
                        {{ abs($card['growth']) }}% {{ $card['comparison'] }}
                    </small>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($reportType == 'annual')
        @foreach($data as $month => $klientes)
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h5>{{ $month }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered keep-table-together">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nu. Referensia</th>
                                <th>Data</th>
                                <th>Kliente</th>
                                <th>ID Card/Passport</th>
                                <th>Nationality</th>
                                <th style="width: 12%; word-wrap: break-word;">Kategoria Instituisaun</th>
                                <th>Telefone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klientes as $kliente)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kliente->nu_ref }}</td>
                                <td>{{ \Carbon\Carbon::parse($kliente->data)->format('d-m-Y') }}</td>
                                <td>{{ $kliente->naran }}</td>
                                <td>{{ $kliente->idcard_passport }}</td>
                                <td>{{ $kliente->nationality }}</td>
                                <td>{{ ucfirst($kliente->kategoria) }}</td>
                                <td>{{ $kliente->nu_telfone }}</td>
                                <td>{{ $kliente->email ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered keep-table-together">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nu. Referensia</th>
                                <th>Data</th>
                                <th>Naran</th>
                                <th>ID Card/Passport</th>
                                <th>Nationality</th><th style="width: 12%; word-wrap: break-word;">Kategoria Instituisaun</th>
                                <th>Telefone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $kliente)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kliente->nu_ref }}</td>
                                <td>{{ \Carbon\Carbon::parse($kliente->data)->format('d-m-Y') }}</td>
                                <td>{{ $kliente->naran }}</td>
                                <td>{{ $kliente->idcard_passport }}</td>
                                <td>{{ $kliente->nationality }}</td>
                                <td>{{ ucfirst($kliente->kategoria) }}</td>
                                <td>{{ $kliente->nu_telfone }}</td>
                                <td>{{ $kliente->email ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
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

    function createStatsTable(cardsData) {
        const table = document.createElement('table');
        table.style.width = '100%';
        table.style.borderCollapse = 'collapse';
        table.style.marginBottom = '20px';
        table.style.fontSize = '10pt';
        
        const thead = document.createElement('thead');
        thead.innerHTML = `
        `;
        
        const tbody = document.createElement('tbody');
        
        cardsData.forEach(card => {
            const row = document.createElement('tr');
            let growthInfo = '';
            
            if (card.growth !== undefined) {
                const arrow = card.growth >= 0 ? '↑' : '↓';
                const color = card.growth >= 0 ? 'green' : 'red';
                growthInfo = `<span style="color: ${color}">${arrow} ${Math.abs(card.growth)}% ${card.comparison || ''}</span>`;
            }
            
            row.innerHTML = `
                <td style="border: 1px solid #ddd; padding: 8px;">${card.title}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">${card.value}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">${growthInfo}</td>
            `;
            tbody.appendChild(row);
        });
        
        table.appendChild(thead);
        table.appendChild(tbody);
        return table;
    }

    function getCardsData() {
        return [
            {title: 'TOTAL KLIENTE', value: {{ $stats['total_kliente'] }}, icon: 'users', color: 'primary'},
            {title: 'KLIENTE FOUN', value: {{ $stats['new_this_period'] }}, icon: 'user-plus', color: 'info'},
            {title: 'IHA EMAIL', value: {{ $stats['with_email'] }}, icon: 'envelope', color: 'info'},
            {title: 'LAIHA EMAIL', value: {{ $stats['without_email'] }}, icon: 'envelope', color: 'info'},
            {title: 'TIMORENSE', value: {{ $stats['total_timorense'] }}, icon: 'user-check', color: 'success'},
            {title: 'ESTRANGEIRO', value: {{ $stats['total_estrangeiro'] }}, icon: 'globe-asia', color: 'warning'},
            {title: 'TOTAL PRIVADU', value: {{ $stats['total_privadu'] }}, icon: 'building', color: 'info'},
            {title: 'TOTAL PUBLIKU', value: {{ $stats['total_publiku'] }}, icon: 'university', color: 'success'}
        ];
    }

    function saveAsWord() {
        const elementsToHide = document.querySelectorAll('.no-print, .no-export');
        elementsToHide.forEach(el => el.style.display = 'none');
        
        const element = document.querySelector('.container').cloneNode(true);
        
        const cardsSection = element.querySelector('.printable-cards');
        if (cardsSection) {
            cardsSection.remove();
        }
        
        const header = createHeader();
        element.insertBefore(header, element.firstChild);
        
        const statsTable = createStatsTable(getCardsData());
        header.parentNode.insertBefore(statsTable, header.nextSibling);
        
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
        element.appendChild(footer);
        
        const html = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <style>
                    body { font-family: Arial, sans-serif; font-size: 11pt; }
                    table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
                    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    th { background-color: #f2f2f2; }
                    .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
                    .footer { margin-top: 20px; text-align: center; font-size: 9pt; }
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
        link.download = 'relatoriu_dadus_kliente.doc';
        
        document.body.appendChild(link);
        link.click();
        
        setTimeout(() => {
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
            elementsToHide.forEach(el => el.style.display = '');
        }, 100);
    }

    function saveAsPDF() {
        const elementsToHide = document.querySelectorAll('.no-print, .no-export');
        elementsToHide.forEach(el => el.style.display = 'none'); 
        
        const element = document.querySelector('.container').cloneNode(true);
        
        const cardsSection = element.querySelector('.printable-cards');
        if (cardsSection) {
            cardsSection.remove();
        }
        
        const header = createHeader();
        element.insertBefore(header, element.firstChild);
        const statsTable = createStatsTable(getCardsData());
        header.parentNode.insertBefore(statsTable, header.nextSibling);
        
        const footer = document.createElement('div');
        footer.style.marginTop = '20px';
        footer.style.paddingTop = '10px';
        footer.style.borderTop = '1px solid #ddd';
        footer.style.textAlign = 'center';
        footer.style.fontSize = '9pt';
        footer.innerHTML = `
            <p>Sistema Jestaun Finanseiru</p>
            <p>© ${new Date().getFullYear()} - Diresaun TI</p>
        `;
        element.appendChild(footer);
        
        const style = document.createElement('style');
        style.innerHTML = `
            @media print {
                .no-print, .no-export {
                    display: none !important;
                }
                
                .keep-table-together {
                    page-break-inside: avoid !important;
                    break-inside: avoid !important;
                }
                
                .table-responsive {
                    overflow: visible !important;
                }
                
                table {
                    width: 100% !important;
                    font-size: 8pt !important;
                }
                
                th, td {
                    padding: 4px !important;
                    white-space: nowrap !important;
                }
                
                th:nth-child(7), td:nth-child(7),
                th:nth-child(9), td:nth-child(9) {
                    white-space: normal !important;
                    word-wrap: break-word !important;
                }
            }
        `;
        element.appendChild(style); 
        
        const opt = {
            margin: [15, 10, 15, 10],
            filename: 'relatoriu_dadus_kliente.pdf',
            image: { 
                type: 'jpeg', 
                quality: 1 
            },
            html2canvas: { 
                scale: 2,
                letterRendering: true,
                useCORS: true,
                scrollX: 0,
                scrollY: 0,
                allowTaint: true
            },
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'landscape',
                compress: true
            },
            pagebreak: { 
                mode: ['css', 'legacy'],
                avoid: '.keep-table-together'
            }
        };
        
        setTimeout(() => {
            html2pdf().set(opt).from(element).save().then(() => {
                elementsToHide.forEach(el => el.style.display = '');
            });
        }, 1000);
    }
</script>
    
<style>
    @media print {
    @page {
        size: A4 landscape;
        margin: 10mm;
    }
    
    body {
        font-size: 10pt;
        color: #000;
        background-color: #fff;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    .no-print, .no-export {
        display: none !important;
    }
    
    .keep-table-together {
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }
    
    /* .table-responsive {
        overflow: visible !important;
    } */
    .table-responsive {
    overflow-x: auto;
    max-width: 100%;
    -webkit-overflow-scrolling: touch;
    }
    
    table {
        width: 100% !important;
        /* font-size: 8pt !important; */
        table-layout: fixed;
    }
    th:nth-child(7), td:nth-child(7) {
            white-space: normal !important;
            word-wrap: break-word !important;
        }
     
/*         
        th:nth-child(1), td:nth-child(1) { width: 5% !important; }
        th:nth-child(2), td:nth-child(2) { width: 10% !important; }
        th:nth-child(3), td:nth-child(3) { width: 10% !important; }
        th:nth-child(4), td:nth-child(4) { width: 15% !important; }
        th:nth-child(5), td:nth-child(5) { width: 12% !important; }
        th:nth-child(6), td:nth-child(6) { width: 12% !important; }
        th:nth-child(7), td:nth-child(7) { width: 12% !important; }
        th:nth-child(8), td:nth-child(8) { width: 10% !important; }
        th:nth-child(9), td:nth-child(9) { width: 14% !important; } */
    }
    th:nth-child(1), td:nth-child(1) { width: 5%; }
    th:nth-child(2), td:nth-child(2) { width: 10%; }
    th:nth-child(3), td:nth-child(3) { width: 10%; }
    th:nth-child(4), td:nth-child(4) { width: 15%; }
    th:nth-child(5), td:nth-child(5) { width: 12%; }
    th:nth-child(6), td:nth-child(6) { width: 12%; }
    th:nth-child(7), td:nth-child(7) { width: 12%; }
    th:nth-child(8), td:nth-child(8) { width: 10%; }
    th:nth-child(9), td:nth-child(9) { width: 14%; }

   
th:nth-child(7), td:nth-child(7), /* Kategoria Instituisaun */
th:nth-child(9), td:nth-child(9)  /* Email */
{
    white-space: normal !important;
    word-wrap: break-word !important;
    overflow-wrap: break-word !important;
    text-overflow: unset !important;
}
    
    th, td {
        padding: 4px !important;
        white-space: nowrap !important;
    }
    
    .card {
        margin-bottom: 15px !important;
        page-break-inside: avoid !important;
    }
    
    .printable-card {
        border: 1px solid #ddd !important;
        box-shadow: none !important;
        margin-bottom: 10px !important;
    }
    
    .printable-card i {
        font-size: 1.5rem !important;
    }
    
    .printable-card h6 {
        font-size: 0.8rem !important;
        margin-bottom: 5px !important;
    }
    
    .printable-card h4 {
        font-size: 1.5rem !important;
        margin-bottom: 5px !important;
    }


/* Style untuk tampilan web */
.card {
    transition: all 0.3s ease;
    border-radius: 10px;
    border-top: 4px solid transparent;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.printable-card .card-body {
    padding: 10px !important;
}

.printable-cards {
    margin-bottom: 20px !important;
}
    </style>
@endsection