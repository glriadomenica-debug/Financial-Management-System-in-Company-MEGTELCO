@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📊 Relatoriu Despeza</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('despeza.generateReport') }}" method="GET">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="report_type" class="form-label">Tipu Relatoriu:</label>
                        <select name="report_type" id="report_type" class="form-control" required>
                            <option value="" hidden>-- Hili Tipu Relatoriu --</option>
                            <option value="annual">Annual</option>
                            <option value="monthly">Fulan</option>
                            {{-- <option value="expense_type">Tipu Despeza</option> --}}
                        </select>
                    </div>
                </div>

                <div id="annual_fields" class="report-fields">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="year" class="form-label">Tinan:</label>
                            <select name="year" id="year" class="form-control">
                                <option value="" hidden>-- Hili Tinan --</option>
                                @for ($i = date('Y'); $i >= 2020; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div id="monthly_fields" class="report-fields" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="year_monthly" class="form-label">Tinan:</label>
                            <select name="year_monthly" id="year_monthly" class="form-control">
                                <option value="" hidden>-- Hili Tinan --</option>
                                @for ($i = date('Y'); $i >= 2020; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="month" class="form-label">Fulan:</label>
                            <select name="month" id="month" class="form-control">
                                <option value="" hidden>-- Hili Fulan --</option>
                                {{-- @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}">{{ $this->getMonth($month) }}</option>
                                @endforeach --}}
                                @foreach($months as $key => $month)
                                    <option value="{{ $key }}">{{ $month }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">🔍 Haree Relatoriu</button>
                    <a href="{{ route('despeza.dadusDespeza') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
 document.getElementById('report_type').addEventListener('change', function() {
    const reportType = this.value;
    
    // Hide all fields first
    document.querySelectorAll('.report-fields').forEach(field => {
        field.style.display = 'none';
    });
    
    // Show relevant fields based on report type
    if (reportType === 'annual' || reportType === 'expense_type') {
        document.getElementById('annual_fields').style.display = 'block';
    } else if (reportType === 'monthly') {
        document.getElementById('monthly_fields').style.display = 'block';
    }
});
</script>

@endsection