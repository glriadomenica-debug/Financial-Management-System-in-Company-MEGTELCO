@extends('layouts.main')

@section('container')
<div class="container mt-4">
    
    <a href="{{ route('metodupagamento.create') }}" class="btn btn-success mb-3">➕ REJISTU METODU PAGAMENTU</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
    {{-- <table class="table table-bordered"> --}}
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Metodu Pagamentu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($metodupagamentus as $mp)
                <tr>
                    <td>{{ $mp->id }}</td>
                    <td>{{ $mp->metodu_selu }}</td>
                    <td>
                        <form action="{{ route('metodupagamento.destroy', $mp->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos metodu pagamentu nee?')">Hamoos</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
