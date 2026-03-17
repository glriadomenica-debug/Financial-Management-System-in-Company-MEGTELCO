@extends('layouts.main')

@section('container')
<div class="container mt-4">
    
    <a href="{{ route('tiputransaksaun.create') }}" class="btn btn-success mb-3">➕ REJISTU TIPU TRANSAKSAUN</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Tipu transaksaun</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tiputransaksauns as $tipu)
                <tr>
                    {{-- <td>{{ $tipu->id }}</td> --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tipu->tipu_transaksaun }}</td>
                    <td>
                        <form action="{{ route('tiputransaksaun.destroy', $tipu->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos tipu transasaun nee?')">Hamoos</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
