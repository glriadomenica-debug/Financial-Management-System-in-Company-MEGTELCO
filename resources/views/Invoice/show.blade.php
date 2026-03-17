@extends('layouts.main')

@section('container')

<style>
    @media print {
        body {
            visibility: hidden;
        }
        .invoice-container {
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 20px;
            box-shadow: none;
        }
        .btn-print {
            display: none;
        }
    }
    /* teks bold*/
    .bold-blue {
        font-weight: bold;
        color: blue;
    }
    .value-text {
        font-family: "Times New Roman", Times, serif;
        font-size: 17px;
        font-weight: bold;
    }
    .btn-edit {
        background-color: #ffc107;
        border-color: #ffc107;
        margin-right: 10px;
    }
    .btn-edit:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }
    .edit-form {
        display: none;
        margin-top: 20px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }

    /* Styling */
    body {
        font-family: "Arial", sans-serif;
        background-color: #f8f9fa;
    }
    .invoice-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        max-width: 800px;
        margin: auto;
    }
    .header {
        text-align: center;
        color: #333;
        font-weight: bold;
    }
    .table {
    table-layout: fixed;
    width: 100%;
}

    .table thead {
        background: #007bff;
        color: white;
    }
    .table th, .table td {
        word-wrap: break-word;
        white-space:normal;
        overflow-wrap: break-word;
        /* overflow: hidden;
        text-overflow: ellipsis; */
        /* padding: 12px;
        text-align: left; */
        font-family: 'Times New Roman', Times, serif;
        font-size: 16px;
        text-align: left;
    }
    .table th:nth-child(2),
.table td:nth-child(2) {
    width: 150px; /* Atur lebar sesuai keinginan */
    text-align: right;
}

    .table tfoot {
        background: #f1f1f1;
        font-weight: bold;
    }
    .footer {
        margin-top: 20px;
        font-size: 14px;
        text-align: center;
        color: #555;
    }
    .btn-print:hover {
        background: #0056b3;
    }

    /* Tambahkan di bagian style */
.spinner-border {
    display: inline-block;
    width: 1rem;
    height: 1rem;
    vertical-align: text-bottom;
    border: .25em solid currentColor;
    border-right-color: transparent;
    border-radius: 50%;
    -webkit-animation: spinner-border .75s linear infinite;
    animation: spinner-border .75s linear infinite;
}
@keyframes spinner-border {
    to { transform: rotate(360deg); }
}
</style>

@php
use Carbon\Carbon;

$dataRegistu = Carbon::parse($klientepakote->kliente->data);
$fulanTetun = [
    'January' => 'Janeiru',
    'February' => 'Fevereiru',
    'March' => 'Marsu',
    'April' => 'Abril',
    'May' => 'Maiu',
    'June' => 'Junu',
    'July' => 'Jullu',
    'August' => 'Agostu',
    'September' => 'Setembru',
    'October' => 'Outobru',
    'November' => 'Novembru',
    'December' => 'Dezembru'
];
$fulanAgora = $fulanTetun[now()->format('F')];
//uja fulan tomak
$dataHahu = Carbon::createFromDate(now()->year, now()->month, $dataRegistu->day);
$dataIkus = $dataHahu->copy()->addMonth()->subDay();

if($invoice && $invoice->data_hahu_servisu && $invoice->data_ikus_servisu) {
    $dataHahu = Carbon::parse($invoice->data_hahu_servisu);
    $dataIkus = Carbon::parse($invoice->data_ikus_servisu);
}

$dataHahuFormat = $dataHahu->format('d ') . $fulanTetun[$dataHahu->format('F')];
$dataIkusFormat = $dataIkus->format('d ') . $fulanTetun[$dataIkus->format('F')] . $dataIkus->format(' Y');


$pakote = $klientepakote->pakote; // husi database kliente pakote nian
$presuPakote = $klientepakote->presu_pakote ?? 0; //husi db kliente pakote

//kalkula loron sira nebe kliente uza internet; +1 inklui lron uja to remate
$totalDays = $dataHahu->diffInDays($dataIkus) + 1; 

// 1. kalkulasaun ba faktura (presupakote / loron iha fulan)
$dailyRate = $presuPakote / $dataHahu->daysInMonth;

//2. sura presu lorlon * loron uza
$subtotal = round($dailyRate * $totalDays, 2);

//3
$taxa_fees = $subtotal * 0.05;
$kustu_manutensaun = $pakote->kustu_manutensaun ?? 0; 
//4
$total_geral = $subtotal + $taxa_fees + $kustu_manutensaun;

$deskrisaunList = json_decode($invoice->deskrisaun ?? '[]', true);
@endphp

<div class="container mt-4">
    <div class="card shadow p-4 invoice-container">
        <div class="text-center">
            <h3 class="fw-bold"> MEGTELCO S.A </h3>
            <p>Rejistu Komersial N°: NIF: 513541479</p>
            <p>Avenida Presidente Nicolau Lobato, Fatuhada, Dili</p>
            <p>Email: finance@megtelco.com | Telefone: 77348202, 78566241</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><strong class="bold-blue">Fatura ba Kontratu #: </strong> 
                    <span class="value-text">{{ $klientepakote->kliente->nu_ref }}</span></p>
                <p><strong class="bold-blue">Data Faktura: </strong> 
                    <span class="value-text">{{ now()->format('d/m/Y') }}</span></p>
                <p><strong class="bold-blue">Data Limite Pagamentu: </strong> 
                    <span class="value-text">{{ now()->addDays(20)->format('d/m/Y') }}</span></p>
            </div>
        </div>

        {{-- Informasaun kliente --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <p class="bold-blue">Ba:</p>
                <p class="value-text">{{ $klientepakote->kliente->naran }}</p>
                <p class="value-text">{{ $klientepakote->kliente->residensia }}</p>
                <p class="value-text">{{ $klientepakote->kliente->nu_telfone }}</p>
            </div>
        </div>

        {{-- Tabela invoice --}}
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Deskrisaun</th>
                    <th class="text-end value-text">Montante</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="value-text">
                        Fornesimentu servisu Internet, {{ $klientepakote->pakote->pakote ?? 'Servisu Internet' }}, 
                        fulan {{ $fulanAgora }}, husi loron {{ $dataHahuFormat }} to'o {{ $dataIkusFormat }}
                    </td>
                    <td class="text-end value-text">${{ number_format($klientepakote->presu_pakote, 2) }}</td>
                </tr>
                
                @foreach($deskrisaunList as $deskrisaun)
                <tr>
                    <td class="value-text">{{ $deskrisaun['text'] }}</td>
                    <td class="text-end value-text">${{ number_format($deskrisaun['montante'], 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Subtotal</th>
                    <th class="text-end value-text">${{ number_format($subtotal, 2) }}</th>
                </tr>
                <tr>
                    <td><strong>Taxa (5%)</strong></td>
                    <td class="text-end value-text">${{ number_format($taxa_fees, 2) }}</td>
                </tr>
                <tr>
                    <td><strong>Kustu Manutensaun</strong></td>
                    <td class="text-end value-text">${{ number_format($kustu_manutensaun, 2) }}</td>
                </tr>
                <tr>
                    <th>Total Geral </th>
                    <th class="text-end value-text">${{ number_format($total_geral, 2) }}</th>
                </tr>
            </tfoot>
        </table>

        {{-- <div class="text-end mt-4">
            <button onclick="saveAndPrintInvoice()" class="btn btn-primary btn-print">Imprime Fatura</button>
        </div> --}}
        
        <div class="text-end mt-4">
            <button onclick="showEditForm()" class="btn btn-edit btn-print">
                <i class="fas fa-edit"></i> Edit
            </button>
            <button onclick="saveAndPrintInvoice()" class="btn btn-primary btn-print">
                <i class="fas fa-print"></i> Imprime Fatura
            </button>
        </div>
        <div id="editForm" class="edit-form">
            <h5><i class="fas fa-edit"></i> Edit Periodu Servisu</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data Hahu </label>
                        <input type="date" id="editDataHahu" class="form-control" 
                               value="{{ $dataHahu->format('Y-m-d') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Data Ikus </label>
                        <input type="date" id="editDataIkus" class="form-control" 
                               value="{{ $dataIkus->format('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <button onclick="cancelEdit()" class="btn btn-secondary">Kansela</button>
                <button onclick="updateInvoice()" class="btn btn-primary">Atualiza</button>
            </div>
        </div>
        <div class="footer">
            <p>Obrigadu ba ita-nia kooperasaun ne'ebé diak.</p>
            <p>Atu hetan informasaun, kontaktu Sra. Jacinta R. P. da Costa iha Telefone: +67078566214 ka Email: megtelcosa@gmail.com.</p>
            <p>Naran Konta: MEGTELCO SA | Numeru Konta: 1444155510001 | IBAN: TL380020144415551000162</p>
        </div>
    </div>
</div>

<script>
function showEditForm() {
    document.getElementById('editForm').style.display = 'block';
}

function cancelEdit() {
    document.getElementById('editForm').style.display = 'none';
}
function updateInvoice() {
    const dataHahu = document.getElementById('editDataHahu').value;
    const dataIkus = document.getElementById('editDataIkus').value;
    
    if(!dataHahu || !dataIkus) {
        alert('Favor preenche data hahu no data ikus!');
        return;
    }
    const startDate = new Date(dataHahu);
    const endDate = new Date(dataIkus);
    const daysInMonth = new Date(startDate.getFullYear(), startDate.getMonth()+1, 0).getDate();
    const totalDays = Math.floor((endDate - startDate) / (1000 * 60 * 60 * 24)) + 1;
    
    ///Kalkulasaun ba edit invoice nian
    const dailyRate = {{ $presuPakote }} / daysInMonth;
    const newSubtotal = Math.round(dailyRate * totalDays * 100) / 100;
    const newTax = Math.round(newSubtotal * 0.05 * 100) / 100;
    const newMaintenance = {{ $kustu_manutensaun }};
    const newTotal = Math.round((newSubtotal + newTax + newMaintenance) * 100) / 100;
    
    document.querySelector('td.value-text').innerHTML = `
        Fornesimentu servisu Internet, {{ $klientepakote->pakote->pakote ?? 'Servisu Internet' }}, 
        fulan {{ $fulanAgora }}, husi loron ${formatDate(startDate)} to'o ${formatDate(endDate)}
    `;
    
    document.querySelector('tfoot tr:nth-child(1) th:nth-child(2)').textContent = '$' + newSubtotal.toFixed(2);
    document.querySelector('tfoot tr:nth-child(2) td:nth-child(2)').textContent = '$' + newTax.toFixed(2);
    document.querySelector('tfoot tr:nth-child(4) th:nth-child(2)').textContent = '$' + newTotal.toFixed(2);

    cancelEdit();
}

function formatDate(date) {
    const monthNames = {
        'January': 'Janeiru', 'February': 'Fevereiru', 'March': 'Marsu', 
        'April': 'Abril', 'May': 'Maiu', 'June': 'Junu',
        'July': 'Jullu', 'August': 'Agostu', 'September': 'Setembru',
        'October': 'Outobru', 'November': 'Novembru', 'December': 'Dezembru'
    };
    const day = date.getDate();
    const monthName = monthNames[date.toLocaleString('en-US', { month: 'long' })];
    return `${day} ${monthName}`;
}
function saveAndPrintInvoice() {
    const btn = document.querySelector('.btn-print');
    btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Prosesu...';
    btn.disabled = true;

    const invoiceData = {
        nu_ref: "{{ $klientepakote->kliente->nu_ref }}",
        data_faktura: "{{ now()->format('Y-m-d') }}",
        data_limite_pagamentu: "{{ now()->addDays(20)->format('Y-m-d') }}",
        naran: "{{ $klientepakote->kliente->naran }}",
        residensia: "{{ $klientepakote->kliente->residensia }}",
        nu_telfone: "{{ $klientepakote->kliente->nu_telfone }}",
        subtotal: parseFloat("{{ $subtotal }}"),
        tax: parseFloat("{{ $taxa_fees }}"),
        maintenance: parseFloat("{{ $kustu_manutensaun }}"),
        total: parseFloat("{{ $total_geral }}"),
        _token: "{{ csrf_token() }}"
    };

    fetch('{{ route("invoice.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        body: JSON.stringify(invoiceData)
    })
    .then(async response => {
        const data = await response.json();
        
        if (!response.ok) {
            if (data && data.message) {
                throw new Error(data.message);
            }
            throw new Error(`Erro HTTP! status: ${response.status}`);
        }
        
        return data;
    })
    .then(data => {
        if (data.success) {
            sessionStorage.setItem('justPrinted', 'true');
            window.print();
            
            setTimeout(() => {
                window.location.href = "{{ route('invoice.dadusInvoice') }}";
            }, 2000);
        } else {
            throw new Error(data.message || 'Erro desconhecidu akontese');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro: ' + error.message);
    })
    .finally(() => {
        btn.innerHTML = 'Imprime Fatura';
        btn.disabled = false;
    });
}

window.addEventListener('afterprint', () => {
    if (sessionStorage.getItem('justPrinted')) {
        sessionStorage.removeItem('justPrinted');
        window.location.href = "{{ route('invoice.dadusInvoice') }}";
    }
});
</script>

@endsection
