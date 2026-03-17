@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📊Relatoriu Kliente pakote</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kliente_pakote.generateReport') }}" method="GET">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="report_type" class="form-label">Tipu Relatoriu</label>
                        <select class="form-select" id="report_type" name="report_type" required>
                            <option value="">Hili tipu relatoriu</option>
                            <option value="annual">Tinan</option>
                            <option value="monthly">Fulan</option>
                            <option value="package_count">Konta Pakote</option>
                            <option value="annual_comparison">Komparasaun Tinan</option>
                            <option value="monthly_comparison">Komparasaun Fulan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 d-none" id="annual-section">
                    <div class="col-md-6">
                        <label for="year" class="form-label">Hili tinan</label>
                        <select class="form-select" id="year" name="year">
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="row mb-3 d-none" id="monthly-section">
                    <div class="col-md-6">
                        <label for="year_monthly" class="form-label">Hili tinan</label>
                        <select class="form-select" id="year_monthly" name="year_monthly">
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="month" class="form-label">Hili fulan</label>
                        <select class="form-select" id="month" name="month">
                            {{-- @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $i == date('m') ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                </option>
                            @endfor --}}
                            @foreach($months as $key => $month)
                            <option value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3 d-none" id="package-count-section">
                    <div class="col-md-6">
                        <label for="package_year" class="form-label">Hili tinan</label>
                        <select class="form-select" id="package_year" name="package_year">
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="package_month" class="form-label">Hili fulan </label>
                        <select class="form-select" id="package_month" name="package_month">
                            <option value="">Fulan hotu-hotu</option>
                            {{-- @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $i == date('m') ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                </option>
                            @endfor --}}
                            @foreach($months as $key => $month)
                            <option value="{{ $key }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3 d-none" id="annual-comparison-section">
                    <div class="col-md-6">
                        <label for="start_year" class="form-label">Tinan Hahu</label>
                        <select class="form-select" id="start_year" name="start_year">
                            @for ($i = 2020; $i <= date('Y'); $i++)
                                <option value="{{ $i }}" {{ $i == 2020 ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="end_year" class="form-label">To'o tinan</label>
                        <select class="form-select" id="end_year" name="end_year">
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="row mb-3 d-none" id="monthly-comparison-section">
                    <div class="col-md-4">
                        <label for="monthly_year" class="form-label">Hili Tinan</label>
                        <select class="form-select" id="monthly_year" name="monthly_year">
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="comparison_start_month" class="form-label">Fulan Hahu</label>
                        <select class="form-select" id="comparison_start_month" name="comparison_start_month">
                            @foreach($months as $key => $month)
                                <option value="{{ $key }}" {{ $key == 1 ? 'selected' : '' }}>{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="comparison_end_month" class="form-label">Fulan Remata</label>
                        <select class="form-select" id="comparison_end_month" name="comparison_end_month">
                            @foreach($months as $key => $month)
                                <option value="{{ $key }}" {{ $key == 12 ? 'selected' : '' }}>{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">🔍 Kria relatoriu</button>
                <a href="{{ route('kliente_pakote.dadusKP') }}" class="btn btn-secondary">⬅️ Fila</a>
               
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('report_type').addEventListener('change', function() {
    const reportType = this.value;
    const sections = [
        'annual-section',
        'monthly-section',
        'package-count-section',
        'annual-comparison-section',
        'monthly-comparison-section'
    ];
    sections.forEach(section => {
        document.getElementById(section).classList.add('d-none');
    });
    if (reportType === 'annual') {
        document.getElementById('annual-section').classList.remove('d-none');
    } else if (reportType === 'monthly') {
        document.getElementById('monthly-section').classList.remove('d-none');
    } else if (reportType === 'package_count') {
        document.getElementById('package-count-section').classList.remove('d-none');
    } else if (reportType === 'annual_comparison') {
        document.getElementById('annual-comparison-section').classList.remove('d-none');
    } else if (reportType === 'monthly_comparison') {
        document.getElementById('monthly-comparison-section').classList.remove('d-none');
    }
});

document.getElementById('start_year').addEventListener('change', function() {
    const startYear = parseInt(this.value);
    const endYearSelect = document.getElementById('end_year');
    
    Array.from(endYearSelect.options).forEach(option => {
        option.disabled = parseInt(option.value) < startYear;
    });
    
    if (parseInt(endYearSelect.value) < startYear) {
        endYearSelect.value = startYear;
    }
});

document.getElementById('monthly_start_year').addEventListener('change', function() {
    const startYear = parseInt(this.value);
    const endYearSelect = document.getElementById('monthly_end_year');
    
    Array.from(endYearSelect.options).forEach(option => {
        option.disabled = parseInt(option.value) < startYear;
    });
    
    if (parseInt(endYearSelect.value) < startYear) {
        endYearSelect.value = startYear;
    }
});
document.getElementById('comparison_start_month').addEventListener('change', function() {
    const startMonth = parseInt(this.value);
    const endMonthSelect = document.getElementById('comparison_end_month');
    
    Array.from(endMonthSelect.options).forEach(option => {
        option.disabled = parseInt(option.value) < startMonth;
    });
    
    if (parseInt(endMonthSelect.value) < startMonth) {
        endMonthSelect.value = startMonth;
    }
});
</script>
@endsection