@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h2 class="mb-0">{{ $title }}</h2>
    </div>

    <div class="report-content">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5>Komparasaun Kliente Foun iha Tinan {{ $year }} - Fulan {{ $monthNames[0] }} to'o {{ end($monthNames) }}</h5>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 15%">Fulan</th>
                                <th style="width: 20%">Total Kliente</th>
                                <th style="width: 20%">Kliente Ativu</th>
                                <th style="width: 20%">Kliente Inativu</th>
                                {{-- <th style="width: 25%">Kresimentu (%)</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $previousTotal = null;
                                $grandTotal = 0;
                                $grandActive = 0;
                                $grandInactive = 0;
                            @endphp
                            @foreach($monthNames as $monthName)
                                @php
                                    $data = $comparisonData[$monthName];
                                    $growth = $previousTotal !== null && $previousTotal != 0 
                                        ? (($data['total'] - $previousTotal) / $previousTotal) * 100 
                                        : null;
                                    $previousTotal = $data['total'];
                                    
                                    $grandTotal += $data['total'];
                                    $grandActive += $data['active'];
                                    $grandInactive += $data['inactive'];
                                @endphp
                                <tr>
                                    <td>{{ $monthName }}</td>
                                    <td>{{ number_format($data['total'], 0, ',', '.') }}</td>
                                    <td>{{ number_format($data['active'], 0, ',', '.') }}</td>
                                    <td>{{ number_format($data['inactive'], 0, ',', '.') }}</td>
                                    {{-- <td>
                                        @if($growth !== null)
                                            <span class="{{ $growth >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ number_format($growth, 2, ',', '.') }}%
                                                @if($growth >= 0)
                                                    <i class="fas fa-arrow-up"></i>
                                                @else
                                                    <i class="fas fa-arrow-down"></i>
                                                @endif
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th>Total</th>
                                <th>{{ number_format($grandTotal, 0, ',', '.') }}</th>
                                <th>{{ number_format($grandActive, 0, ',', '.') }}</th>
                                <th>{{ number_format($grandInactive, 0, ',', '.') }}</th>
                                {{-- <th>-</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5>Komparasaun Pakote iha Tinan {{ $year }} - Fulan {{ $monthNames[0] }} to'o {{ end($monthNames) }}</h5>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20%">Pakote</th>
                                @foreach($monthNames as $monthName)
                                    {{-- <th style="width: 15%">{{ $monthName }} (Total)</th> --}}
                                    <th>{{ $monthName }}</th>
                                    {{-- <th style="width: 15%">{{ $monthName }} (%)</th> --}}
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $allPackages = [];
                                $packageTotals = [];
                                $monthPackageTotals = [];
                                
                                // Initialize totals
                                foreach($monthNames as $monthName) {
                                    $monthPackageTotals[$monthName] = 0;
                                }
                                
                                foreach($monthNames as $monthName) {
                                    foreach($packageComparison[$monthName] as $package) {
                                        $allPackages[$package->pakote_id] = $package->pakote->pakote;
                                        $monthPackageTotals[$monthName] += $package->total;
                                    }
                                }
                            @endphp

                            @foreach($allPackages as $packageId => $packageName)
                                <tr>
                                    <td>{{ $packageName }}</td>
                                    @php
                                        // $packageTotals[$packageId] = ['total' => 0, 'percentage' => 0];
                                        $packageTotals[$packageId] = ['total' => 0];
                                    @endphp
                                    @foreach($monthNames as $monthName)
                                        @php
                                            $monthPackage = $packageComparison[$monthName]->firstWhere('pakote_id', $packageId);
                                            $monthTotal = $comparisonData[$monthName]['total'];
                                            $packageCount = $monthPackage ? $monthPackage->total : 0;
                                            // $percentage = $monthTotal > 0 ? ($packageCount / $monthTotal) * 100 : 0;
                                            
                                            $packageTotals[$packageId]['total'] += $packageCount;
                                        @endphp
                                        <td>{{ number_format($packageCount, 0, ',', '.') }}</td>
                                        {{-- <td>{{ number_format($percentage, 2, ',', '.') }}%</td> --}}
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th>Total</th>
                                @foreach($monthNames as $monthName)
                                    <th>{{ number_format($monthPackageTotals[$monthName], 0, ',', '.') }}</th>
                                    @php
                                        $monthTotal = $comparisonData[$monthName]['total'];
                                        // $percentage = $monthTotal > 0 ? ($monthPackageTotals[$monthName] / $monthTotal) * 100 : 0;
                                    @endphp
                                    {{-- <th>{{ number_format($percentage, 2, ',', '.') }}%</th> --}}
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-4 avoid-break">
            <div class="card-header bg-primary text-white">
                <h5>Grafico Komparasaun</h5>
            </div>
            <div class="chart-container" style="position: relative; height:400px; width:100%; margin-bottom: 30px;">
                <canvas id="comparisonChart"></canvas>
            </div>
        </div>
    </div>
    
    <div class="no-print">
        <button onclick="saveAsPDF()" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> PDF
        </button>
        <button onclick="saveAsWord()" class="btn btn-primary ms-2">
            <i class="fas fa-file-word me-2"></i> Word
        </button>
        <a href="{{ route('kliente_pakote.report') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Fila
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
let myChart;

document.addEventListener('DOMContentLoaded', function() {
    const monthNames = @json($monthNames);
    const comparisonData = @json($comparisonData);

    const totalData = monthNames.map(month => comparisonData[month].total);
    const activeData = monthNames.map(month => comparisonData[month].active);
    const inactiveData = monthNames.map(month => comparisonData[month].inactive);

    const ctx = document.getElementById('comparisonChart').getContext('2d');
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthNames,
            datasets: [
                {
                    label: 'Total Kliente',
                    data: totalData,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Kliente Ativu',
                    data: activeData,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Kliente Inativu',
                    data: inactiveData,
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: `Komparasaun Kliente Ativu/Inativu iha Tinan ${@json($year)}`
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.raw.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Kliente'
                    },
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Fulan'
                    }
                }
            }
        }
    });
});
</script>
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
                <p style="margin: 0; font-size: 10pt;">Relatoriu Komparasaun Kliente Pakote</p>
                <p style="margin: 0; font-size: 9pt;">Tinan {{ $year }} - Fulan {{ $monthNames[0] }} to'o {{ end($monthNames) }}</p>
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

    function saveAsPDF() {
        const elementsToHide = document.querySelectorAll('.no-print');
        elementsToHide.forEach(el => el.style.display = 'none');
        
        const element = document.querySelector('.report-content').cloneNode(true);
        
        const header = createHeader();
        element.insertBefore(header, element.firstChild);
        
        const chartCanvas = document.getElementById('comparisonChart');
        const chartImage = chartCanvas.toDataURL('image/png');
        
        const chartContainer = element.querySelector('.chart-container');
        if (chartContainer) {
            chartContainer.innerHTML = `<img id="chart-img-pdf" src="${chartImage}" style="width:100%; max-height:400px; object-fit:contain;">`;
        }
        
        const tables = element.querySelectorAll('table');
        tables.forEach(table => {
            table.style.width = '100%';
            table.style.fontSize = '9pt';
            table.style.borderCollapse = 'collapse';
            
            const rows = table.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                if (index % 2 === 0) {
                    row.style.backgroundColor = '#f9f9f9';
                }
            });
            
            const ths = table.querySelectorAll('th');
            ths.forEach(th => {
                th.style.backgroundColor = '#0d6efd';
                th.style.color = 'white';
                th.style.padding = '6px';
                th.style.textAlign = 'center';
                th.style.border = '1px solid #ddd';
            });
            
            const tds = table.querySelectorAll('td');
            tds.forEach(td => {
                td.style.padding = '5px';
                td.style.border = '1px solid #ddd';
                td.style.textAlign = 'center';
            });

            // Style footer
            const tfoot = table.querySelector('tfoot');
            if (tfoot) {
                tfoot.style.fontWeight = 'bold';
                const tfootTds = tfoot.querySelectorAll('td, th');
                tfootTds.forEach(cell => {
                    cell.style.backgroundColor = '#f8f9fa';
                });
            }
        });
        
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
        
        const style = document.createElement('style');
        style.innerHTML = `
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
                
                .container {
                    width: 100% !important;
                    padding: 0 !important;
                    margin: 0 !important;
                }
                
                .table-responsive {
                    overflow: visible !important;
                    width: 100% !important;
                }
                
                table {
                    width: 100% !important;
                    font-size: 8pt !important;
                    table-layout: fixed;
                    border-collapse: collapse;
                    margin-bottom: 15px;
                }
                
                th {
                    background-color: #0d6efd !important;
                    color: white !important;
                    padding: 6px !important;
                    text-align: center !important;
                    border: 1px solid #ddd !important;
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }
                
                td {
                    padding: 5px !important;
                    border: 1px solid #ddd !important;
                    text-align: center !important;
                }
                
                tr:nth-child(even) {
                    background-color: #f9f9f9 !important;
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }
                
                tfoot tr {
                    background-color: #f8f9fa !important;
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                    font-weight: bold !important;
                }
                
                .card {
                    border: none !important;
                    box-shadow: none !important;
                    page-break-inside: avoid;
                    margin-bottom: 15px !important;
                }
                
                .card-header {
                    background-color: #0d6efd !important;
                    color: white !important;
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }
                
                .card-body {
                    padding: 5px !important;
                }
                
                .avoid-break {
                    page-break-inside: avoid !important;
                    break-inside: avoid !important;
                }
                
                #chart-img-pdf {
                    max-height: 300px !important;
                    margin-bottom: 25px !important;
                    page-break-inside: avoid;
                }
                
                .text-success {
                    color: #28a745 !important;
                }
                
                .text-danger {
                    color: #dc3545 !important;
                }
            }
        `;
        element.appendChild(style);
        
        // PDF options
        const opt = {
            margin: [10, 10, 10, 10],
            filename: 'relatoriu_komparasaun_kliente_pakote.pdf',
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
                allowTaint: true,
                logging: false
            },
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'landscape',
                compress: true
            },
            pagebreak: { 
                mode: ['css', 'legacy'],
                avoid: ['.avoid-break', 'table', 'tr', 'td', 'th', 'img']
            }
        };
        
        // Generate PDF
        setTimeout(() => {
            html2pdf().set(opt).from(element).save().then(() => {
                elementsToHide.forEach(el => el.style.display = '');
            });
        }, 1000);
    }

    function saveAsWord() {
        const elementsToHide = document.querySelectorAll('.no-print');
        elementsToHide.forEach(el => el.style.display = 'none');
        
        const element = document.querySelector('.report-content').cloneNode(true);
        
        const header = createHeader();
        element.insertBefore(header, element.firstChild);
        
        const chartCanvas = document.getElementById('comparisonChart');
        const chartImage = chartCanvas.toDataURL('image/png');
        
        const chartContainer = element.querySelector('.chart-container');
        if (chartContainer) {
            chartContainer.innerHTML = `<img src="${chartImage}" style="width:100%; max-height:400px; object-fit:contain;">`;
        }
        
        // Improve table styling for Word
        const tables = element.querySelectorAll('table');
        tables.forEach(table => {
            table.style.width = '100%';
            table.style.fontSize = '10pt';
            table.style.borderCollapse = 'collapse';
            table.style.marginBottom = '15px';
            
            // Style headers
            const ths = table.querySelectorAll('th');
            ths.forEach(th => {
                th.style.backgroundColor = '#0d6efd';
                th.style.color = 'white';
                th.style.padding = '6px';
                th.style.textAlign = 'center';
                th.style.border = '1px solid #ddd';
                th.style.fontWeight = 'bold';
            });
            
            // Style cells
            const tds = table.querySelectorAll('td');
            tds.forEach((td, index) => {
                td.style.padding = '5px';
                td.style.border = '1px solid #ddd';
                td.style.textAlign = 'center';
                
                // Zebra striping
                const rowIndex = Math.floor(index / table.rows[0].cells.length);
                if (rowIndex % 2 === 0) {
                    td.style.backgroundColor = '#f9f9f9';
                }
            });
            
            // Style footer
            const tfoot = table.querySelector('tfoot');
            if (tfoot) {
                tfoot.style.fontWeight = 'bold';
                const tfootTds = tfoot.querySelectorAll('td, th');
                tfootTds.forEach(cell => {
                    cell.style.backgroundColor = '#f8f9fa';
                });
            }
        });
        
        // footer
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
        
        // html dok 
        const html = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <style>
                    @page {
                        size: 29.7cm 21cm; /* A4 landscape */
                        margin: 1cm;
                    }
                    
                    body { 
                        font-family: Arial, sans-serif; 
                        font-size: 11pt; 
                        margin: 1cm;
                        width: 100%;
                    }
                    
                    .header { 
                        display: flex; 
                        justify-content: space-between; 
                        align-items: center;
                        margin-bottom: 20px;
                        border-bottom: 1px solid #ddd;
                        padding-bottom: 10px;
                        width: 100%;
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
                        margin-bottom: 15px; 
                        font-size: 10pt;
                        page-break-inside: avoid;
                    }
                    
                    th { 
                        background-color: #0d6efd; 
                        color: white;
                        padding: 6px;
                        text-align: center;
                        border: 1px solid #ddd;
                        font-weight: bold;
                    }
                    
                    td { 
                        border: 1px solid #ddd; 
                        padding: 5px;
                        text-align: center;
                    }
                    
                    tr:nth-child(even) td {
                        background-color: #f9f9f9;
                    }
                    
                    tfoot tr {
                        background-color: #f8f9fa;
                        font-weight: bold;
                    }
                    
                    .footer { 
                        margin-top: 20px; 
                        text-align: center; 
                        font-size: 9pt; 
                        border-top: 1px solid #ddd;
                        padding-top: 10px;
                        width: 100%;
                    }
                    
                    .card {
                        margin-bottom: 20px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        page-break-inside: avoid;
                        width: 100%;
                    }
                    
                    .card-header {
                        background-color: #0d6efd;
                        color: white;
                        padding: 10px;
                        font-weight: bold;
                    }
                    
                    .card-body {
                        padding: 15px;
                    }
                    
                    .chart-img {
                        width: 100%;
                        max-height: 400px;
                        object-fit: contain;
                        page-break-inside: avoid;
                    }
                    
                    .text-success {
                        color: #28a745;
                    }
                    
                    .text-danger {
                        color: #dc3545;
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
        link.download = 'relatoriu_komparasaun_kliente_pakote.doc';
        
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
@media print {
    .no-print {
        display: none !important;
    }
    body * {
        zoom: 0.9;
    }
    .report-content, .report-content * {
        visibility: visible;
    }
    .report-content {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
    .card {
        margin-bottom: 25px !important;
        page-break-inside: avoid !important;
    }    
    #chart-img-pdf {
        max-height: 300px !important;
        margin-bottom: 25px !important;
    }
    .table-responsive {
        overflow: visible !important;
        width: 100% !important;
    }
    table {
        width: 100% !important;
        font-size: 9pt !important;
        page-break-inside: avoid !important;
    }
    tfoot tr {
        background-color: #f8f9fa !important;
        font-weight: bold !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }   
}
.avoid-break {
    page-break-inside: avoid;
    break-inside: avoid;
}

.chart-container {
    position: relative;
    height: 400px;
    width: 100%;
    margin-bottom: 30px !important;
}

.table-sm th, .table-sm td {
    padding: 0.3rem !important;
}
</style>
@endsection