@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ REJISTU TIPU TRANSAKSAUN</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tiputransaksaun.store') }}" method="POST">
                @csrf
                
              
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- <div class="mb-3">
                    <label for="data" class="form-label">📅 Data</label>
                    <input type="date" id="data" name="data" class="form-control" value="{{ old('data') }}" required>
                </div>
                 --}}
                <div class="mb-3">
                    <label for="tipu_transaksaun" class="form-label">📜 Tipu Transaksaun</label>
                    <input type="text" id="tipu_transaksaun" name="tipu_transaksaun" class="form-control" 
                    value="{{ old('tipu_transaksaun') }}" placeholder="Insere tipu transaksaun" required>
                </div>
                
                {{-- <div class="mb-3">
                    <label for="montante" class="form-label">💰 Montante</label>
                    <input type="number" id="montante" name="montante" class="form-control" value="{{ old('montante') }}" placeholder="Insere montante" required>
                </div> --}}
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('tiputransaksaun.dadus') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
