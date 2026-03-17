@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            {{-- <h5>Relatoriu Kliente</h5> --}}
            <h5 class="mb-0">📊 Relatoriu Kliente</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kliente.generateReport') }}" method="GET">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="report_type" class="form-label">Tipu Relatoriu</label>
                        <select class="form-select" id="report_type" name="report_type" required>
                            <option value="">Hili tipu relatoriu</option>
                            <option value="annual">Tinan</option>
                            <option value="monthly">Fulan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3" id="annual-section">
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

                <button type="submit" class="btn btn-primary">🔍 Kria relatoriu</button>
                <a href="{{ route('kliente.daduskliente') }}" class="btn btn-secondary">⬅️ Fila</a>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('report_type').addEventListener('change', function() {
    const reportType = this.value;
    const annualSection = document.getElementById('annual-section');
    const monthlySection = document.getElementById('monthly-section');

    annualSection.classList.add('d-none');
    monthlySection.classList.add('d-none');

    if (reportType === 'annual') {
        annualSection.classList.remove('d-none');
    } else if (reportType === 'monthly') {
        monthlySection.classList.remove('d-none');
    }
});
</script>
@endsection