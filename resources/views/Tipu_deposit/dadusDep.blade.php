@extends('layouts.main')

@section('container')
<div class="container mt-4">
    
    <a href="{{ route('tipu_deposit.rejistuDep') }}" class="btn btn-success mb-3">➕ REJISTU TIPU DEPOSITU</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
    {{-- <table class="table table-bordered"> --}}
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Tipu Depositu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipuDeps as $tp)
                <tr>
                    <td>{{ $tp->id }}</td>
                    <td>{{ $tp->tipu_depositu }}</td>
                    <td>
                        <form action="{{ route('tipu_deposit.destroy', $tp->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos tipu depositu nee?')">Hamoos</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
