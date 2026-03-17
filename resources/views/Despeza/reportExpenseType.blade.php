@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $title }}</h5>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">Total Despeza</h6>
                                <p class="card-text h4">${{ number_format($totalExpense, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Tipu Despeza</th>
                            <th>Total Gastu</th>
                            <th>Persentajen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenseTypes as $expense)
                            <tr>
                                <td>{{ $expense->tipuTransaksaun->tipu_transaksaun }}</td>
                                <td>${{ number_format($expense->total, 2, ',', '.') }}</td>
                                <td>${{ number_format(($expense->total / $totalExpense) * 100, 2) }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <a href="{{ route('despeza.report') }}" class="btn btn-secondary">⬅️ Fila ba Formulariu</a>
                <button class="btn btn-success" onclick="window.print()">🖨️ Imprime Relatoriu</button>
            </div>
        </div>
    </div>
</div>
@endsection