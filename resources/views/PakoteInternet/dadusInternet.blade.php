@extends('layouts.main')
@section('container')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <div>
             <a href="{{ route('pakote.internet.rejistuInternet') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle"></i> AUMENTA PAKOTE INTERNET
        </a>
        
            <button onclick="saveAsPDF()" class="btn btn-warning mb-3 no-export">
                <i class="fas fa-file-pdf"></i> PRINT PDF
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success no-export">
            {{ session('success') }}
        </div>
    @endif

    <div id="pdf-content">
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-bordered table-hover keep-table-together">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Pakote</th>
                                <th>Presu</th>
                                <th>Kapasidade (Mbps)</th>
                                <th>Kustu Manutensaun</th>
                                <th class="no-export">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pakoteInternet as $index => $pakote)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pakote->pakote }}</td>
                                    <td>${{ number_format($pakote->presu, 3) }}</td>
                                    <td>{{ $pakote->kapasidade }} Mbps</td>
                                    <td>${{ number_format($pakote->kustu_manutensaun, 2) }}</td>
                                    <td class="no-export">
                                        <a href="{{ route('pakoteinternet.edit', $pakote->id) }}" class="btn btn-sm btn-info">Edit</a>

                                        <form action="{{ route('pakoteinternet.destroy', $pakote->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos dadus pakote nee?')">Hamoos</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script> --}}
{{-- <script>
    function saveAsPDF() {
        const element = document.getElementById('pdf-content').cloneNode(true);
        
        const actionColumns = element.querySelectorAll('.no-export');
        actionColumns.forEach(col => col.remove());
        
        // Create header with logo
        const header = document.createElement('div');
        header.style.display = 'flex';
        header.style.justifyContent = 'space-between';
        header.style.alignItems = 'center';
        header.style.marginBottom = '20px';
        header.style.borderBottom = '1px solid #ddd';
        header.style.paddingBottom = '10px';
        
        // Logo container with circular styling
        const logo = document.createElement('div');
        logo.innerHTML = `
           
                <div>
                    <h2 style="margin: 0; color: #0d6efd; font-size: 18pt;">MEGTELCO S.A</h2>
                    <p style="margin: 0; font-size: 10pt;">Lista Pakote Internet</p>
                </div>
            </div>
        `;
        
        // Date info
        const dateInfo = document.createElement('div');
        dateInfo.innerHTML = `
            <div style="text-align: right;">
                <p style="margin: 0; font-size: 9pt;">Data: ${new Date().toLocaleDateString()}</p>
                <p style="margin: 0; font-size: 9pt;">${new Date().toLocaleTimeString()}</p>
            </div>
        `;
        
        header.appendChild(logo);
        header.appendChild(dateInfo);
        
        element.insertBefore(header, element.firstChild);
        
        const elementsToHide = document.querySelectorAll('.no-print, .no-export');
        elementsToHide.forEach(el => el.style.display = 'none');
      
        const opt = {
            margin: [10, 20, 10, 10],
            filename: 'lista_pakote_internet.pdf',
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
                // Important for images
                logging: true,
                allowTaint: true,
                async: true
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
        
        // Generate PDF
        setTimeout(() => {
            html2pdf().set(opt).from(element).save().then(() => {
                elementsToHide.forEach(el => el.style.display = '');
            });
        }, 500);
    }
</script> --}}


{{-- <style>
    /* Screen styles */
    @media screen {
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
        .card {
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
    }
    
    /* Print styles */
    @media print {
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
            color: #000;
            background-color: #fff;
        }
        .no-print, .no-export {
            display: none !important;
        }
        .keep-table-together {
            page-break-inside: avoid !important;
        }
        .table {
            width: 100% !important;
            font-size: 9pt !important;
            border-collapse: collapse !important;
        }
        .table th, .table td {
            padding: 4px !important;
            border: 1px solid #ddd !important;
        }
        .table thead th {
            background-color: #f8f9fa !important;
            font-weight: bold;
        }
        .card {
            border: none !important;
            box-shadow: none !important;
        }
    }
    .logo-container {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 15px;
        border: 2px solid #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .logo-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style> --}}
@endsection