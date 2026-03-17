@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ Registu Kliente</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kliente_pakote.store') }}" method="POST">
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
                    <label for="nu_ref" class="form-label">Nu. Referensia:</label>
                    <input type="text" id="nu_ref" name="nu_ref" class="form-control" required>
                </div> --}}
                <div class="mb-3">
                    <label for="nu_ref" class="form-label">Nu. Referensia:</label>
                    <select id="nu_ref" name="nu_ref" class="form-control" onchange="fetchKlienteData()">
                        <option value="" hidden>-- Hili Nu. Referensia --</option>
                        @foreach ($klienteOptions as $kliente)
                            <option value="{{ $kliente->nu_ref }}">{{ $kliente->nu_ref }}</option>
                        @endforeach
                    </select>
                </div>
                
                

                {{-- <div class="mb-3">
                    <label for="data" class="form-label">Data:</label>
                    <input type="date" id="data" name="data" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="naran" class="form-label">Naran:</label>
                    <input type="text" id="naran" name="naran" class="form-control" required>
                </div> --}}

                <div class="mb-3">
                    <label for="data" class="form-label">Data:</label>
                    <input type="date" id="data" name="data" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="naran" class="form-label">Naran:</label>
                    <input type="text" id="naran" name="naran" class="form-control" required readonly>
                </div>

                <div class="mb-3">
                    <label for="naran" class="form-label">Nu. Telfone:</label>
                    <input type="text" id="nu_telfone" name="nu_telfone" class="form-control" required readonly>
                </div>

                <div class="mb-3">
                    <label for="residensia" class="form-label">Lokal:</label>
                    <input type="text" id="residensia" name="residensia" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pakote" class="form-label">Pakote:</label>
                    <select name="pakote_id" id="pakote" class="form-control" onchange="updateFields()">
                        <option value="" hidden>-- Hili Pakote --</option>
                        @foreach ($pakoteOptions as $option)
                            <option value="{{ $option->id }}" 
                                data-presu="{{ $option->presu }}"
                                data-kapasidade="{{ $option->kapasidade }}">
                                {{ $option->pakote }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="kapasidade" class="form-label">Kapasidade:</label>
                    <input type="text" id="kapasidade" name="kapasidade" class="form-control" required readonly>
                </div>

                <div class="mb-3">
                    <label for="presu_pakote" class="form-label">Presu Pakote:</label>
                    <input type="text" id="presu_pakote" name="presu_pakote" class="form-control" required readonly>
                </div>

                <div class="mb-3">
                    <label for="presu_instalasaun" class="form-label">Presu Instalasaun:</label>
                    <input type="text" id="presu_instalasaun" name="presu_instalasaun" class="form-control" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('kliente_pakote.dadusKP') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateFields() {
        const pakoteSelect = document.getElementById('pakote');
        const selectedOption = pakoteSelect.options[pakoteSelect.selectedIndex];

        if (selectedOption.value) { 
            document.getElementById('presu_pakote').value = selectedOption.getAttribute('data-presu') || '';
            document.getElementById('kapasidade').value = selectedOption.getAttribute('data-kapasidade') || '';
        } else {
            document.getElementById('presu_pakote').value = '';
            document.getElementById('kapasidade').value = '';
        }
    }
</script>

<script>
    function fetchKlienteData() {
        const nuRef = document.getElementById('nu_ref').value;

        if (nuRef) {
            fetch(`/get-kliente-data?nu_ref=${encodeURIComponent(nuRef)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.naran && data.data) {
                        document.getElementById('naran').value = data.naran;
                        document.getElementById('data').value = data.data;
                        document.getElementById('nu_telfone').value = data.nu_telfone;
                        document.getElementById('residensia').value = data.residensia;
                    } else {
                        document.getElementById('naran').value = '';
                        document.getElementById('data').value = '';
                        document.getElementById('nu_telfone').value = '';
                        document.getElementById('residensia').value = '';
                    }
                })
                .catch(error => {
                    console.error('Error fetching kliente data:', error);
                    document.getElementById('naran').value = '';
                    document.getElementById('data').value = '';
                    document.getElementById('nu_telfone').value = '';
                    document.getElementById('residensia').value = '';
                });
        } else {
            document.getElementById('naran').value = '';
            document.getElementById('data').value = '';
            document.getElementById('nu_telfone').value = '';
            document.getElementById('residensia').value = '';
        }
    }
</script>



@endsection
