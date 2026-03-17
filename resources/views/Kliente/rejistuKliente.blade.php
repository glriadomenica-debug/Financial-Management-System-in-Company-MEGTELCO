@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ Registu Kliente</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kliente.store') }}" method="POST">
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
                    <label for="nu_ref" class="form-label">Nu. Referensia:</label>
                    <input type="text" id="nu_ref" name="nu_ref" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Data:</label>
                    <input type="date" id="data" name="data" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="naran" class="form-label">Kliente:</label>
                    <input type="text" id="naran" name="naran" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="idcard_passport" class="form-label">IdCard / Passport:</label>
                    <input type="text" id="idcard_passport" name="idcard_passport" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="nationality" class="form-label">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="residensia" class="form-label">Lokal:</label>
                    <textarea id="residensia" name="residensia" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="nu_telfone" class="form-label">Nu. Telefone:</label>
                    <input type="text" id="nu_telfone" name="nu_telfone" class="form-control" >
                </div>

 
                <div class="mb-3">
                    <label for="kategoria" class="form-label">Kategoria</label>
                    <select id="kategoria" name="kategoria" class="form-select" required onchange="toggleInstituisaun()">
                        <option value="" disabled selected>Hili kategoria instituisaun</option>
                        <option value="privadu" @if(old('kategoria') == 'privadu') selected @endif>Privadu</option>
                        <option value="publiku" @if(old('kategoria') == 'publiku') selected @endif>Publiku</option>
                    </select>
                </div>
                
                <div class="mb-3" id="instituisaunField" style="display: none;">
                    <label for="profisaun" class="form-label">Instituisaun:</label>
                    <input type="text" id="profisaun" name="profisaun" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('kliente.daduskliente') }}" class="btn btn-secondary">⬅️ Fila</a>
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
    
    function toggleInstituisaun() {
        const kategoria = document.getElementById('kategoria').value;
        const instituisaunField = document.getElementById('instituisaunField');
        
        if (kategoria === 'privadu' || kategoria === 'publiku') {
            instituisaunField.style.display = 'block';
            
            if (kategoria === 'privadu') {
                document.getElementById('profisaun').setAttribute('required', 'required');
            } else {
                document.getElementById('profisaun').removeAttribute('required');
            }
        } else {
            instituisaunField.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        toggleInstituisaun();
    });

</script>

@endsection
