@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ REJISTU METODU PAGAMENTU</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('metodupagamento.store') }}" method="POST">
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
                    <label for="metodu_selu" class="form-label">📜 Metodu Selu</label>
                    <input type="text" id="metodu_selu" name="metodu_selu" class="form-control" 
                    value="{{ old('metodu_selu') }}" placeholder="Insere metodu selu" required>
                </div>
                
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('metodupagamento.daduspagamentu') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
