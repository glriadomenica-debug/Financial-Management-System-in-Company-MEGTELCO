@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h2>{{ $title }}</h2>
       
    </div>
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>Komparasaun Kliente foun </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive page-break-avoid">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Tinan</th>
                            <th>Total Kliente</th>
                            <th>Kliente Ativu</th>
                            <th>Kliente Inativu</th>
                            {{-- <th>Total Income</th> --}}
                            {{-- <th>Kresimentu (%)</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $previousTotal = null;
                        @endphp
                        @foreach($years as $year)
                            @php
                                $data = $comparisonData[$year];
                                $growth = $previousTotal !== null && $previousTotal != 0 
                                    ? (($data['total'] - $previousTotal) / $previousTotal) * 100 
                                    : null;
                                $previousTotal = $data['total'];
                            @endphp
                            <tr>
                                <td>{{ $year }}</td>
                                <td>{{ $data['total'] }}</td>
                                <td>{{ $data['active'] }}</td>
                                <td>{{ $data['inactive'] }}</td>
                                {{-- <td>${{ number_format($data['income'], 2) }}</td> --}}
                                {{-- <td>
                                    @if($growth !== null)
                                        <span class="{{ $growth >= 0 ? 'text-success' : 'text-danger' }}">
                                            {{ number_format($growth, 2) }}%
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
                    
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5>Grafico Komparasaun</h5>
        </div>
        <div class="chart-container" style="position: relative; height:400px; width:100%">
            <canvas id="comparisonChart"></canvas>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Komparasaun Pakote</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive page-break-avoid">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Pakote</th>
                            @foreach($years as $year)
                                <th>{{ $year }} (Total)</th>
                                {{-- <th>{{ $year }} (%)</th> --}}
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $allPackages = [];
                            foreach($years as $year) {
                                foreach($packageComparison[$year] as $package) {
                                    $allPackages[$package->pakote_id] = $package->pakote->pakote;
                                }
                            }
                        @endphp

                        @foreach($allPackages as $packageId => $packageName)
                            <tr>
                                <td>{{ $packageName }}</td>
                                @foreach($years as $year)
                                    @php
                                        $yearPackage = $packageComparison[$year]->firstWhere('pakote_id', $packageId);
                                        $yearTotal = $comparisonData[$year]['total'];
                                        $packageCount = $yearPackage ? $yearPackage->total : 0;
                                        // $percentage = $yearTotal > 0 ? ($packageCount / $yearTotal) * 100 : 0;
                                    @endphp
                                    <td>{{ $packageCount }}</td>
                                    {{-- <td>{{ number_format($percentage, 2) }}%</td> --}}
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <button onclick="saveAsPDF()" class="btn btn-danger hide-in-pdf">
            <i class="fas fa-file-pdf"></i> PDF
        </button>
        <button onclick="saveAsWord()" class="btn btn-primary no-export ms-2">
            <i class="fas fa-file-word"></i> Word
        </button>
        <a href="{{ route('kliente_pakote.report') }}" class="btn btn-secondary hide-in-pdf">
            <i class="fas fa-arrow-left"></i> Fila
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
function saveAsWord() {
    const elementsToHide = document.querySelectorAll('.no-print, .no-export');
    elementsToHide.forEach(el => el.style.display = 'none');
    
    const element = document.querySelector('.container').cloneNode(true);
    
    const canvas = document.getElementById('comparisonChart');
    if (canvas) {
        const canvasImg = canvas.toDataURL('image/png');
        const imgElement = document.createElement('img');
        imgElement.src = canvasImg;
        imgElement.style.maxWidth = '100%';
        imgElement.style.height = 'auto';
        const chartContainer = element.querySelector('.chart-container');
        if (chartContainer) {
            chartContainer.innerHTML = '';
            chartContainer.appendChild(imgElement);
        }
    }
    
    const html = `
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Relatoriu Annual Kliente</title>
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
                    font-size: 18pt;
                }
                .header-text p {
                    margin: 0;
                    font-size: 10pt;
                }
                .date-info {
                    text-align: right;
                    font-size: 9pt;
                }
                .card { 
                    border: 1px solid #ddd; 
                    border-radius: 4px;
                    margin-bottom: 20px; 
                    padding: 15px;
                    page-break-inside: avoid;
                }
                .card-header {
                    background-color: #0d6efd;
                    color: white;
                    padding: 10px 15px;
                    margin: -15px -15px 15px -15px;
                    border-radius: 3px 3px 0 0;
                    font-size: 12pt;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                    margin-bottom: 20px;
                    font-size: 10pt;
                    page-break-inside: avoid;
                }
                th {
                    background-color: #f2f2f2;
                    text-align: center;
                    padding: 8px;
                    border: 1px solid #ddd;
                    font-weight: bold;
                }
                td {
                    padding: 8px;
                    border: 1px solid #ddd;
                    text-align: center;
                }
                .text-success { color: #28a745; }
                .text-danger { color: #dc3545; }
                img {
                    max-width: 100%;
                    height: auto;
                    display: block;
                    margin: 10px auto;
                }
                .footer { 
                    margin-top: 20px; 
                    text-align: center; 
                    font-size: 9pt; 
                    border-top: 1px solid #ddd;
                    padding-top: 10px;
                }
                .page-break {
                    page-break-after: always;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <div style="display: flex; align-items: center;">
                    <div style="margin-right: 15px;">
                        <img src="{{ asset('images/logo.png') }}" alt="Company Logo" 
                             style="height: 50px; width: 50px; object-fit: contain;">
                    </div>
                    <div class="header-text">
                        <h2>MEGTELCO S.A</h2>
                        <p>Relatoriu Komparasaun Kliente Annual</p>
                    </div>
                </div>
                <div class="date-info">
                    <p>Data: ${new Date().toLocaleDateString()}</p>
                    <p>${new Date().toLocaleTimeString()}</p>
                </div>
            </div>
            
            ${Array.from(element.querySelectorAll('.card')).map(card => card.outerHTML).join('')}

            <div class="footer">
                <p>Sistema Jestaun Kliente</p>
                <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
            </div>
        </body>
        </html>
    `;
    
    const blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'relatoriu_annual_kliente.doc';
    document.body.appendChild(link);
    link.click();

    setTimeout(() => {
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
        elementsToHide.forEach(el => el.style.display = '');
    }, 100);
}
document.addEventListener('DOMContentLoaded', function() {
    const years = @json($years);
    const comparisonData = @json($comparisonData);
    
    const totalData = years.map(year => comparisonData[year].total);
    const activeData = years.map(year => comparisonData[year].active);
    const inactiveData = years.map(year => comparisonData[year].inactive);
    
    const ctx = document.getElementById('comparisonChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: years,
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
            plugins: {
                title: {
                    display: true,
                    text: 'Komparasaun Kliente Ativu/Inativu'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.raw}`;
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
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tinan'
                    }
                }
            }
        }
    });
});

function printReport() {
    const buttons = document.querySelectorAll('.no-print, .no-export');
    buttons.forEach(button => {
        button.style.display = 'none';
    });
    window.print();
    setTimeout(() => {
        buttons.forEach(button => {
            button.style.display = '';
        });
    }, 500);
}
function saveAsPDF() {
    const elementsToHide = document.querySelectorAll('.no-print,.hide-in-pdf,.no-export');
    elementsToHide.forEach(el => el.style.display = 'none');
    
    const element = document.querySelector('.container').cloneNode(true);
    
    const header = document.createElement('div');
    header.style.display = 'flex';
    header.style.justifyContent = 'space-between';
    header.style.alignItems = 'center';
    header.style.marginBottom = '15px';
    header.style.paddingBottom = '10px';
    header.style.borderBottom = '1px solid #eee';
    
    header.innerHTML = `
        <div style="display: flex; align-items: center;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" 
                 style="height: 40px; width: 40px; margin-right: 10px;">
            <div>
                <h3 style="margin: 0; color: #0d6efd; font-size: 16px;">MEGTELCO S.A</h3>
                <p style="margin: 0; font-size: 12px; color: #666;">Relatoriu Komparasaun Kliente</p>
            </div>
        </div>
        <div style="text-align: right; font-size: 11px;">
            <p style="margin: 0;">Data: ${new Date().toLocaleDateString()}</p>
            <p style="margin: 0;">${new Date().toLocaleTimeString()}</p>
        </div>
    `;
    
    const footer = document.createElement('div');
    footer.style.marginTop = '15px';
    footer.style.paddingTop = '10px';
    footer.style.borderTop = '1px solid #eee';
    footer.style.textAlign = 'center';
    footer.style.fontSize = '10px';
    footer.style.color = '#666';
    footer.innerHTML = `
          <p>Sistema Jestaun Finanseiru</p>
            <p>© ${new Date().getFullYear()} - MEGTELCO S.A</p>
        `;
    
    const canvas = document.getElementById('comparisonChart');
    if (canvas) {
        return new Promise((resolve) => {
            setTimeout(() => {
                const canvasImg = canvas.toDataURL('image/png');
                const img = new Image();
                img.src = canvasImg;
                img.style.width = '100%';
                img.style.maxWidth = '700px';
                img.style.height = 'auto';
                img.style.display = 'block';
                img.style.margin = '0 auto 15px';
                
                const chartContainer = element.querySelector('.chart-container');
                if (chartContainer) {
                    chartContainer.innerHTML = '';
                    chartContainer.appendChild(img);
                    
                    element.insertBefore(header, element.firstChild);
                    element.appendChild(footer);
                    
                    const style = document.createElement('style');
                    style.innerHTML = `
                        body {
                            font-family: Arial, sans-serif;
                            font-size: 10pt;
                            line-height: 1.4;
                            padding: 10px;
                        }
                        .card {
                            border: 1px solid #e0e0e0;
                            border-radius: 4px;
                            margin-bottom: 15px;
                            page-break-inside: avoid;
                            break-inside: avoid;
                        }
                        .card-header {
                            background-color: #f8f9fa;
                            padding: 8px 12px;
                            border-bottom: 1px solid #e0e0e0;
                            font-weight: bold;
                            font-size: 11pt;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            font-size: 9pt;
                            page-break-inside: avoid;
                            break-inside: avoid;
                            margin-bottom: 10px;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 5px 8px;
                            text-align: center;
                        }
                        th {
                            background-color: #f5f5f5;
                            font-weight: bold;
                        }
                        .text-success { color: #28a745 !important; }
                        .text-danger { color: #dc3545 !important; }
                        @page {
                            size: A4;
                            margin: 15mm 10mm;
                        }
                    `;
                    element.appendChild(style);
                    
                    const opt = {
                        margin: [10, 10, 10, 10], // [top, left, bottom, right]
                        filename: `relatoriu_kliente_${new Date().getFullYear()}.pdf`,
                        image: { type: 'jpeg', quality: 0.95 },
                        html2canvas: { 
                            scale: 2,
                            logging: false,
                            useCORS: true,
                            allowTaint: true,
                            letterRendering: true,
                            scrollX: 0,
                            scrollY: 0
                        },
                        jsPDF: { 
                            unit: 'mm',
                            format: 'a4',
                            orientation: 'portrait',
                            compress: true
                        },
                        pagebreak: { 
                            mode: ['avoid-all', 'css', 'legacy'],
                            before: '.page-break-before',
                            after: '.page-break-after'
                        }
                    };
                    
                    html2pdf().set(opt).from(element).save().then(() => {
                        elementsToHide.forEach(el => el.style.display = '');
                        resolve();
                    });
                }
            }, 1000); 
        });
    }
}
</script>

<style>
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 15px;
}
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    border-collapse: collapse;
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #dee2e6;
    padding: 0.5rem;
}

.table-sm th,
.table-sm td {
    padding: 0.3rem;
}
.card {
    margin-bottom: 20px;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0.03);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.chart-container {
    position: relative;
    height: 400px;
    width: 100%;
    min-height: 300px;
    margin: 15px 0;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
    color: #212529;
    background-color: rgba(0, 0, 0, 0.075);
}

.text-center {
    text-align: center !important;
}

.table-light,
.table-light > th,
.table-light > td {
    background-color: #f8f9fa;
}

.table-light th,
.table-light td,
.table-light thead th,
.table-light tbody + tbody {
    border-color: #e9ecef;
}

@media print {
     body {
        padding: 0.5cm;
        font-size: 10pt;
    }
    
    .table {
        border-collapse: collapse !important;
        width: 100% !important;
    }
    
    .table td, .table th {
        background-color: #fff !important;
        padding: 3px !important;
        font-size: 9pt !important;
    }
    
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd !important;
    }
    
    .table-sm th, 
    .table-sm td {
        padding: 2px !important;
    }
    .card {
        border-width: 1px !important;
        margin-bottom: 15px !important;
        page-break-inside: avoid !important;
    }
    
    .no-print, .hide-in-pdf {
        display: none !important;
    }
    
    .page-break-avoid {
        page-break-inside: avoid !important;
    }
    .chart-container {
        height: 300px !important;
    }

}
</style>
@endsection