@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">✏️ Edit Pakote Internet</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pakote.internet.update', $pakote->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Method PUT for update -->

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
                    <label for="pakote" class="form-label">Pakote:</label>
                    <input type="text" id="pakote" name="pakote" class="form-control" value="{{ $pakote->pakote }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="kapasidade" class="form-label">Kapasidade:</label>
                    <input type="text" id="kapasidade" name="kapasidade" class="form-control" value="{{ $pakote->kapasidade }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="presu" class="form-label">Presu:</label>
                    <input type="number" id="presu" name="presu" class="form-control" step="0.001" value="{{ $pakote->presu }}" required>
                </div>

                <div class="mb-3">
                    <label for="kustu_manutensaun" class="form-label">Kustu Manutensaun:</label>
                    <input type="number" id="kustu_manutensaun" name="kustu_manutensaun" class="form-control" step="0.001" value="{{ $pakote->kustu_manutensaun }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Update Pakote</button>
                    <a href="{{ route('pakote.internet.dadusInternet') }}" class="btn btn-warning">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
