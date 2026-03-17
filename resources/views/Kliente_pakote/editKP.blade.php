@extends('layouts.main')

@section('container')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">✏️ Edit Kliente Pakote</h5>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h5>Nu.ref - {{ $klientePakote->nu_ref }}</h5>
            <form action="{{ route('kliente_pakote.update', $klientePakote->id) }}" method="POST">
                @csrf
                @method('PUT') 

                <div class="mb-3">
                    <label for="nu_ref" class="form-label">Nu. Referensia:</label>
                    <input type="text" id="nu_ref" name="nu_ref" class="form-control" value="{{ $klientePakote->nu_ref }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="data" class="form-label">Data:</label>
                    <input type="date" id="data" name="data" class="form-control" value="{{ $klientePakote->data }}" required>
                </div>

                <div class="mb-3">
                    <label for="naran" class="form-label">Naran:</label>
                    <input type="text" id="naran" name="naran" class="form-control" value="{{ $klientePakote->naran }}" required>
                </div>

                <div class="mb-3">
                    <label for="nu_telfone" class="form-label">Nu. Telefone:</label>
                    <input type="text" id="nu_telfone" name="nu_telfone" class="form-control" value="{{ $klientePakote->nu_telfone }}" required>
                </div>

                <div class="mb-3">
                    <label for="residensia" class="form-label">Lokal:</label>
                    <input type="text" id="residensia" name="residensia" class="form-control" value="{{ $klientePakote->residensia }}" required>
                </div>

                <div class="mb-3">
                    <label for="pakote" class="form-label">Pakote:</label>
                    <select id="pakote" name="pakote_id" class="form-control" onchange="updateFields()">
                        <option value="" hidden>-- Hili Pakote --</option>
                        @foreach ($pakoteOptions as $pakote)
                            <option value="{{ $pakote->id }}" data-kapasidade="{{ $pakote->kapasidade }}
                                " data-presu="{{ $pakote->presu }}" {{ $klientePakote->pakote_id == $pakote->id ? 
                                'selected' : '' }}>
                                {{ $pakote->pakote }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kapasidade" class="form-label">Kapasidade:</label>
                    <input type="text" id="kapasidade" name="kapasidade" class="form-control" value="{{ $klientePakote->kapasidade }}" required>
                </div>

                <div class="mb-3">
                    <label for="presu_pakote" class="form-label">Presu Pakote:</label>
                    <input type="number" id="presu_pakote" name="presu_pakote" class="form-control" step="0.001" value="{{ $klientePakote->presu_pakote }}" required>
                </div>

                <div class="mb-3">
                    <label for="presu_instalasaun" class="form-label">Presu Instalasaun:</label>
                    <input type="number" id="presu_instalasaun" name="presu_instalasaun" class="form-control" step="0.01" value="{{ $klientePakote->presu_instalasaun }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Update</button>
                    <a href="{{ route('kliente_pakote.dadusKP') }}" class="btn btn-warning">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Function to update Kapasidade and Presu values based on Pakote selection
    function updateFields() {
        var pakoteSelect = document.getElementById('pakote');
        var selectedOption = pakoteSelect.options[pakoteSelect.selectedIndex];

        // Get Kapasidade and Presu from the selected pakote
        var kapasidade = selectedOption.getAttribute('data-kapasidade');
        var presu = selectedOption.getAttribute('data-presu');

        // Update the fields
        document.getElementById('kapasidade').value = kapasidade;
        document.getElementById('presu_pakote').value = presu;
    }

    // Run updateFields when the page loads
    document.addEventListener("DOMContentLoaded", function() {
        updateFields();
    });
</script>

@endsection
