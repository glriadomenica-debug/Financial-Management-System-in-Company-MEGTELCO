@extends('layouts.main')

@section('container')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📊 {{ $title }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('likidasaun.generateReport') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="report_type">Tipu Relatoriu</label>
                            <select class="form-control" id="report_type" name="report_type" required>
                                <option value="" hidden>-- Hili Tipu Relatoriu --</option>
                                <option value="annual" {{ old('report_type') == 'annual' ? 'selected' : '' }}>Tinan</option>
                                <option value="monthly" {{ old('report_type') == 'monthly' ? 'selected' : '' }}>Fulan</option>
                                <option value="year_comparison" {{ old('report_type') == 'year_comparison' ? 'selected' : '' }}>Komparasaun Tinan</option>
                                <option value="month_comparison" {{ old('report_type') == 'month_comparison' ? 'selected' : '' }}>Komparasaun Fulan</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4" id="year_field">
                        <div class="form-group">
                            <label for="year">Tinan</label>
                            <select class="form-control" id="year" name="year">
                                @for($y = date('Y'); $y >= 2020; $y--)
                                    <option value="{{ $y }}" {{ old('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4" id="month_field" style="display: none;">
                        <div class="form-group">
                            <label for="month">Fulan</label>
                            <select class="form-control" id="month" name="month">
                                @foreach($months as $key => $month)
                                    <option value="{{ $key }}" {{ old('month') == $key ? 'selected' : '' }}>{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4" id="year_monthly_field" style="display: none;">
                        <div class="form-group">
                            <label for="year_monthly">Tinan</label>
                            <select class="form-control" id="year_monthly" name="year_monthly">
                                @for($y = date('Y'); $y >= 2020; $y--)
                                    <option value="{{ $y }}" {{ old('year_monthly') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4" id="comparison_year_field" style="display: none;">
                        <div class="form-group">
                            <label for="comparison_year">Kompara ho Tinan</label>
                            <select class="form-control" id="comparison_year" name="comparison_year">
                                @for($y = date('Y')-1; $y >= 2020; $y--)
                                    <option value="{{ $y }}" {{ old('comparison_year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4" id="comparison_month_field" style="display: none;">
                        <div class="form-group">
                            <label for="comparison_month">Kompara ho Fulan</label>
                            <select class="form-control" id="comparison_month" name="comparison_month">
                                @foreach($months as $key => $month)
                                    <option value="{{ $key }}" {{ old('comparison_month') == $key ? 'selected' : '' }}>{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-chart-bar"></i> Haree Relatoriu
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const reportType = document.getElementById('report_type');
    const yearField = document.getElementById('year_field');
    const monthField = document.getElementById('month_field');
    const yearMonthlyField = document.getElementById('year_monthly_field');
    const comparisonYearField = document.getElementById('comparison_year_field');
    const comparisonMonthField = document.getElementById('comparison_month_field');
    
    function updateFields() {
        const type = reportType.value;
        
        // Hide all fields first
        yearField.style.display = 'none';
        monthField.style.display = 'none';
        yearMonthlyField.style.display = 'none';
        comparisonYearField.style.display = 'none';
        comparisonMonthField.style.display = 'none';
        
        // Show relevant fields based on report type
        if (type === 'annual') {
            yearField.style.display = 'block';
        } else if (type === 'monthly') {
            monthField.style.display = 'block';
            yearMonthlyField.style.display = 'block';
        } else if (type === 'year_comparison') {
            yearField.style.display = 'block';
            comparisonYearField.style.display = 'block';
        } else if (type === 'month_comparison') {
            monthField.style.display = 'block';
            yearMonthlyField.style.display = 'block';
            comparisonMonthField.style.display = 'block';
        }
    }
    
    // Initial update
    updateFields();
    
    // Update when report type changes
    reportType.addEventListener('change', updateFields);
});
</script>
@endsection