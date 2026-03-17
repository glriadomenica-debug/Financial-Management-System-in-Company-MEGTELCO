@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📊 Relatoriu Status Pagamentu</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('statuspagamentu.generateReport') }}" method="GET">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="report_type" class="form-label">Tipu Relatoriu:</label>
                        <select name="report_type" id="report_type" class="form-control" required>
                            <option value="" hidden>-- Hili Tipu Relatoriu --</option>
                            <option value="both">Jeral</option>
                            <option value="paid">Kliente Selu Ona</option>
                            <option value="unpaid">Kliente Seidauk Selu</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="month" class="form-label">Fulan:</label>
                        <select name="month" id="month" class="form-control" required>
                            <option value="" hidden>-- Hili Fulan --</option>
                            @foreach($months as $key => $month)
                                <option value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="year" class="form-label">Tinan:</label>
                        <select name="year" id="year" class="form-control" required>
                            <option value="" hidden>-- Hili Tinan --</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pakote_id" class="form-label">Tipu Pakote:</label>
                        <select name="pakote_id" id="pakote_id" class="form-control">
                            <option value="">Pakote hotu-hotu</option>
                            @foreach($tipuPakotes as $pakote)
                                <option value="{{ $pakote->id }}">{{ $pakote->pakote }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">🔍 Haree Relatoriu</button>
                    <a href="{{ route('statuspagamentu.dadusPagamentu') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set current month and year as default
    const currentDate = new Date();
    document.getElementById('month').value = currentDate.getMonth() + 1;
    document.getElementById('year').value = currentDate.getFullYear();
});
</script>
@endsection