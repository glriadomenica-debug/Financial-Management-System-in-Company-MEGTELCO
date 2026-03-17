@extends('layouts.main')

@section('container')
<div class="container mt-4" id="reportContent">
    

    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h5>{{ $title }}</h5>
            <div class="no-print"> 
                <button onclick="saveAsPDF()" class="btn btn-light">
                    <i class="fas fa-file-pdf"></i> PDF
                </button>
                <button onclick="saveAsWord()" class="btn btn-light">
                    <i class="fas fa-file-word"></i> Word
                </button>
                <a href="{{ route('kliente_pakote.report') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Fila
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($popularPackages->isEmpty())
                <div class="alert alert-info">La iha dadus ba relatoriu ne'e</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Naran Pakote</th>
                                <th>Kapasidade</th>
                                <th>Total Kliente</th>
                                {{-- <th>Persentajen</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalCustomers = $popularPackages->sum('total');
                            @endphp
                            @foreach($popularPackages as $index => $package)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $package->pakote->pakote }}</td>
                                    <td>{{ $package->pakote->kapasidade }} Mbps</td>
                                    <td>{{ $package->total }}</td>
                                    {{-- <td>{{ round(($package->total / $totalCustomers) * 100, 2) }}%</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-center">
                    <h5>Grafico</h5>
                    <div class="chart-wrapper mx-auto">
                        <canvas id="packageChart" class="chart-canvas"></canvas>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Chart.js, html2pdf, html2canvas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

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
                <p style="margin: 0; font-size: 10pt;">Relatoriu Pakote Popular</p>
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

    document.addEventListener('DOMContentLoaded', function () {
        const packageLabels = @json($popularPackages->pluck('pakote.pakote') ?? []);
        const packageTotals = @json($popularPackages->pluck('total') ?? []);
        const totalCustomers = {{ $totalCustomers }};
        const packagePercentages = packageTotals.map(total => {
            return ((total / totalCustomers) * 100).toFixed(2);
        });

        const ctx = document.getElementById('packageChart').getContext('2d');
        if (packageLabels.length > 0 && packageTotals.length > 0) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: packageLabels,
                    datasets: [
                        {
                            label: 'Total Kliente',
                            data: packageTotals,
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Persentajen uza (%)',
                            data: packagePercentages,
                            backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                            type: 'line',
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Grafico Pakote Internet no Persentajen'
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    let label = context.dataset.label || '';
                                    if (label) label += ': ';
                                    label += context.datasetIndex === 0 ? context.raw + ' kliente' : context.raw + '%';
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            title: { display: true, text: 'Total Kliente' },
                            ticks: { stepSize: 1 }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            title: { display: true, text: 'Persentajen (%)' },
                            min: 0,
                            max: 100,
                            grid: { drawOnChartArea: false }
                        },
                        x: {
                            title: { display: true, text: 'Tipu Pakote Internet' }
                        }
                    }
                }
            });
        }
    });
    async function saveAsPDF() {
    const buttons = document.querySelectorAll('.no-print');
    buttons.forEach(btn => btn.style.display = 'none');
    
    const element = document.getElementById('reportContent').cloneNode(true);
    
    await new Promise(resolve => setTimeout(resolve, 500));
    
    const canvas = document.getElementById('packageChart');
    if (canvas) {
        const imageData = canvas.toDataURL('image/png');
        const img = new Image();
        img.src = imageData;
        img.style.maxWidth = '100%';
        
        const chartContainer = element.querySelector('#packageChart').parentNode;
        chartContainer.innerHTML = '';
        chartContainer.appendChild(img);
    }
    
    const header = createHeader();
    element.insertBefore(header, element.firstChild);
    
    const footer = createFooter();
    element.appendChild(footer);
    
    const style = document.createElement('style');
    style.innerHTML = `
        @media print {
            body {
                font-family: Arial, sans-serif;
                font-size: 10pt;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                font-size: 9pt;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 4px;
                text-align: center;
            }
            th {
                background-color: #f2f2f2;
            }
            img {
                max-width: 100%;
                height: auto;
            }
            .no-print {
                display: none !important;
            }
        }
    `;
    element.appendChild(style);
    
    const opt = {
        margin: [15, 10, 15, 10],
        filename: 'relatoriu_pakote_uzadu.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { 
            scale: 2,
            useCORS: true,
            logging: true,
            allowTaint: true
        },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };
    
    await html2pdf().from(element).set(opt).save();
    
    buttons.forEach(btn => btn.style.display = '');
}
async function saveAsWord() {
    const buttons = document.querySelectorAll('.no-print');
    buttons.forEach(btn => btn.style.display = 'none');
    
    const element = document.getElementById('reportContent').cloneNode(true);
    
    await new Promise(resolve => setTimeout(resolve, 500));
    
    const canvas = document.getElementById('packageChart');
    if (canvas) {
        const imageData = canvas.toDataURL('image/png');
        const img = new Image();
        img.src = imageData;
        img.style.maxWidth = '100%';
        
        const chartContainer = element.querySelector('#packageChart').parentNode;
        chartContainer.innerHTML = '';
        chartContainer.appendChild(img);
    }
    
    const header = createHeader();
    element.insertBefore(header, element.firstChild);
    
    const footer = createFooter();
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
                    text-align: center; 
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
                img {
                    max-width: 100%;
                    height: auto;
                    display: block;
                    margin: 0 auto;
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
    link.download = 'relatoriu_pakote_uzadu.doc';
    document.body.appendChild(link);
    link.click();
    
    setTimeout(() => {
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
        buttons.forEach(btn => btn.style.display = '');
    }, 100);
}
document.addEventListener('DOMContentLoaded', function () {    
    window.chartReady = false;
    const chart = new Chart(ctx, {
        options: {
            animation: {
                onComplete: function() {
                    window.chartReady = true;
                }
            }
        }
    });
});   
</script>

<style>
@media print {
    body * {
        visibility: hidden;
    }
    #reportContent, #reportContent * {
        visibility: visible;
    }
    #reportContent {
        position: absolute;
        left: 0;
        top: 0;
    }
    .no-print {
        display: none;
    }
     .chart-canvas {
        height: 250px !important; 
    }
}
.table th, .table td {
    vertical-align: middle !important;
}
.chart-wrapper, .table-responsive {
    page-break-inside: avoid;
}
.chart-canvas {
    width: 100% !important;
    max-width: 600px;
    height: 300px !important; 
    display: block;
    margin: 0 auto;
    background-color: white;
}
</style>
@endsection