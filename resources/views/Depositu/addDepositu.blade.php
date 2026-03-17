@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ Aumenta Dadus Depositu/Levantamento</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('depositu.store') }}" method="POST">
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
                    <label for="data_depositu" class="form-label">📅 Data</label>
                    <input type="date" id="data_depositu" name="data_depositu" class="form-control" value="{{ old('data_depositu', date('Y-m-d')) }}" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tipu_depositu_husi_id" class="form-label">📤 Husi</label>
                        <select class="form-control" id="tipu_depositu_husi_id" name="tipu_depositu_husi_id" required>
                            <option value="">-- Hili Husi --</option>
                            @foreach($tipudepositus as $td)
                                <option value="{{ $td->id }}" {{ old('tipu_depositu_husi_id') == $td->id ? 'selected' : '' }}>
                                    {{ $td->tipu_depositu }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="tipu_depositu_ba_id" class="form-label">📥 Ba</label>
                        <select class="form-control" id="tipu_depositu_ba_id" name="tipu_depositu_ba_id" required>
                            <option value="">-- Hili Ba --</option>
                            @foreach($tipudepositus as $td)
                                <option value="{{ $td->id }}" {{ old('tipu_depositu_ba_id') == $td->id ? 'selected' : '' }}>
                                    {{ $td->tipu_depositu }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="montante" class="form-label">💰 Montante</label>
                    <input type="number" id="montante" name="montante" class="form-control" value="{{ old('montante') }}" placeholder="Insere montante" step="0.01" required>
                </div>
                
                {{-- <div class="mb-3 form-check">
                    <input type="hidden" name="levantamento" value="0"> <!-- Default value -->
                    <input type="checkbox" class="form-check-input" id="levantamento" name="levantamento" value="1" {{ old('levantamento', $depositus->levantamento ?? 0) ? 'checked' : '' }}>
                    <label class="form-check-label" for="levantamento">📤 Levantamento (Cash Withdrawal)</label>
                </div>

                <div class="mb-3 form-check">
                    <input type="hidden" name="bank_charge" value="0"> <!-- Default value -->
                    <input type="checkbox" class="form-check-input" id="bank_charge" name="bank_charge" value="1" {{ old('bank_charge', $depositus->bank_charge ?? 0) ? 'checked' : '' }}>
                    <label class="form-check-label" for="bank_charge">🏦 Bank Charge</label>
                </div>    --}}

                <div class="mb-3 form-check">
                    <input type="hidden" name="levantamento" value="0">
                    <input type="checkbox" class="form-check-input" id="levantamento" name="levantamento" value="1" 
                        {{ old('levantamento', isset($depositus) ? $depositus->levantamento : 0) ? 'checked' : '' }}>
                    <label class="form-check-label" for="levantamento">📤 Levantamento (Cash Withdrawal)</label>
                </div>

                <div class="mb-3 form-check">
                    <input type="hidden" name="bank_charge" value="0">
                    <input type="checkbox" class="form-check-input" id="bank_charge" name="bank_charge" value="1" 
                        {{ old('bank_charge', isset($depositus) ? $depositus->bank_charge : 0) ? 'checked' : '' }}>
                    <label class="form-check-label" for="bank_charge">🏦 Bank Charge</label>
                </div>
                
                <div class="mb-3">
                    <label for="deskrisaun" class="form-label">📝 Deskrisaun</label>
                    <textarea id="deskrisaun" name="deskrisaun" class="form-control" placeholder="Deskrisaun kona ba transasaun">{{ old('deskrisaun') }}</textarea>
                </div>
                
                {{-- <div class="mb-3">
                    <label for="referencia" class="form-label">🔖 Referensia</label>
                    <input type="text" id="referencia" name="referencia" class="form-control" value="{{ old('referencia') }}" placeholder="Numero referensia">
                </div> --}}
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('depositu.hareDepositu') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection