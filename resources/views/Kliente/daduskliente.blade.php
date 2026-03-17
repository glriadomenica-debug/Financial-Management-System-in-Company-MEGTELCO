@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="d-flex align-items-center gap-2 mb-3">
        <a href="{{ route('kliente.rejistuKliente') }}" class="btn btn-success">➕REJISTU KLIENTE FOUN</a>
        <a href="{{ route('kliente.report') }}" class="btn btn-info">PRINT RELATORIU</a>
        
        @if(session('susesu'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nu. Referensia</th>
                    <th>Data</th>
                    <th>Kliente</th>
                    <th>IDCard / Passport</th>
                    <th>Nationality</th>
                    <th>Lokal</th>
                    <th>Nu. Telefone</th>
                    <th>Kategoria Instituisaun</th>
                    <th>Instituisaun</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daduskliente as $kliente)
                    <tr style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f5f5f5'" onmouseout="this.style.backgroundColor=''">
                        <td>{{ $kliente->nu_ref }}</td>
                        <td>{{ \Carbon\Carbon::parse($kliente->data)->format('d-m-Y') }}</td>
                        <td>{{ $kliente->naran }}</td>
                        <td>{{ $kliente->idcard_passport }}</td>
                        <td>{{ $kliente->nationality }}</td>
                        <td>{{ $kliente->residensia }}</td>
                        <td>{{ $kliente->nu_telfone }}</td>
                        <td>{{ $kliente->kategoria }}</td>
                        <td>{{ $kliente->profisaun }}</td>
                        <td>{{ $kliente->email }}</td>
                        <td>
                            <a href="{{ route('kliente.edit', $kliente->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('kliente.delete', $kliente->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos dadus kliente?')">Hamoos</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- <style>
    /* Hover effect for table rows */
    .table-hover tbody tr:hover {
        background-color: #f5f5f5;
        cursor: pointer;
    }
    
    /* Smooth transition effect */
    .table-hover tbody tr {
        transition: background-color 0.2s ease;
    }
    
    /* Action buttons styling */
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    
    /* Table header styling */
    .table-dark th {
        background-color: #343a40;
        color: white;
    }
    
    /* Table border styling */
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
</style> --}}
@endsection