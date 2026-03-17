@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ REJISTU TIPU DEPOSITU</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tipu_deposit.store') }}" method="POST">
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

                <div class="mb-3">
                    <label for="tipu_depositu" class="form-label">📜 Tipu Depositu</label>
                    <input type="text" id="tipu_depositu" name="tipu_depositu" class="form-control" 
                    value="{{ old('tipu_depositu') }}" placeholder="Insere tipu depositu" required>
                </div>
                            
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('tipu_deposit.dadusDep') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
