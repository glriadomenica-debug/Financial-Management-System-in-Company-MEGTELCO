{{-- Dashboard Prinsipal --}}

@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <!-- Statistics Cards -->
    <div class="row mb-4">
        <!-- Card 1: Total Kliente -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Kliente</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-kliente">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Pakote Hola Ona -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pakote Hola Ona</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-pakote-hola">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-network-wired fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Income Internet -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Income Internet cash ($)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-pakote-internet">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Income Instalasaun -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Income Instalasaun cash ($)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-instalasaun">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 5: Overall Income -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-purple shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-purple text-uppercase mb-1">
                                Overall Income ($)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-income">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 6: Total Gastus -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Gastus ($)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-despeza">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 7: Balansu -->
        <div class="col-md-3 mb-4">
            <div class="card border-left-teal shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-teal text-uppercase mb-1">
                                Balansu ($)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-balansu">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-balance-scale fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- konta montante nebe halo depositu -->
{{-- <div class="col-md-3 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Deposit BNU ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-deposit-bnu">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-piggy-bank fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Total Deposit HTM ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-deposit-htm">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-wallet fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- saldo iha bnu -->
<div class="col-md-3 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Saldo BNU Atual ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="bnu-balance">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-university fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Saldo HTM Atual ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="htm-balance">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card border-left-secondary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                        Saldo Brangkas Atual ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="brangkas-balance">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Total Levantamento BNU ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-levantamento-bnu">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Total Levantamento HTM ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-levantamento-htm">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-3 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Total Levantamento Brangkas ($)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-levantamento-brangkas">0</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    <!-- Charts Section -->
    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Top 5 Pakote Populár</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="topPakotesChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Distribuisaun Status</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="statusChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include necessary JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .border-left-primary { border-left: 0.25rem solid #4e73df !important; }
    .border-left-success { border-left: 0.25rem solid #1cc88a !important; }
    .border-left-info { border-left: 0.25rem solid #36b9cc !important; }
    .border-left-warning { border-left: 0.25rem solid #f6c23e !important; }
    .border-left-danger { border-left: 0.25rem solid #e74a3b !important; }
    .border-left-purple { border-left: 0.25rem solid #6f42c1 !important; }
    .border-left-teal { border-left: 0.25rem solid #20c9a6 !important; }
    .text-purple { color: #6f42c1 !important; }
    .text-teal { color: #20c9a6 !important; }
    .card { transition: transform 0.3s ease; }
    .card:hover { transform: translateY(-5px); }
    .chart-area { position: relative; height: 200px; width: 100%; }
    .chart-pie { position: relative; height: 200px; width: 100%; }
</style>

<script>
$(document).ready(function() {
    // [Your existing JavaScript code remains the same]
    $.ajax({
        url: '{{ route("kliente_pakote.statistics") }}',
        type: 'GET',
        success: function(data) {
            // Update stats cards
            $('#total-kliente').text(data.totalKliente);
            $('#total-pakote-hola').text(data.totalPakoteHola);
            $('#total-pakote-internet').text('$' + data.totalPakoteInternet);
            $('#total-instalasaun').text('$' + data.totalInstalasaun);
            $('#total-despeza').text('$' + data.totalDespeza);
            $('#total-balansu').text('$'+data.totalbalansu.toFixed(2));
            $('#total-income').text('$' + data.totalIncome);
            $('#total-deposit-bnu').text('$' + data.totalDepositBNU);
            $('#total-deposit-htm').text('$' + data.totalDepositHTM);
            $('#total-levantamento-bnu').text('$' + data.totalLevantamentoBNU);
            $('#total-levantamento-htm').text('$' + data.totalLevantamentoHTM);
            $('#bnu-balance').text('$' + data.bnuBalance);
            $('#htm-balance').text('$' + data.htmBalance);

            $('#brangkas-balance').text('$' + data.brangkasBalance);
            $('#total-deposit-brangkas').text('$' + data.totalDepositBrangkas);
            $('#total-levantamento-brangkas').text('$' + data.totalLevantamentoBrangkas);
        // Update card 
            $('#total-cash-in').text('$' + (data.totalIncome + data.totalLevantamentoBNU + data.totalLevantamentoHTM));
            $('#total-cash-out').text('$' + (data.totalDespeza + data.totalDepositBNU + data.totalDepositHTM ));
           
            const ctx1 = document.getElementById('topPakotesChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: data.topPakotes.map(p => p.pakote ? p.pakote.pakote : 'Pakote Laekziste'),
                    datasets: [{
                        label: 'Total Kliente',
                        data: data.topPakotes.map(p => p.total),
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(xhr) {
            console.error('Error fetching statistics:', xhr.responseText);
        }
    });

    // Status distribution chart
    $.ajax({
        url: '{{ route("kliente_pakote.statusDistribution") }}',
        type: 'GET',
        success: function(statusData) {
            const ctx2 = document.getElementById('statusChart').getContext('2d');
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Active', 'Inactive'],
                    datasets: [{
                        data: [statusData.active, statusData.inactive],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 99, 132, 0.7)'
                        ]
                    }]
                }
            });
        },
        error: function(xhr) {
            console.error('Error fetching status distribution:', xhr.responseText);
        }
    });
});
</script>
@endsection