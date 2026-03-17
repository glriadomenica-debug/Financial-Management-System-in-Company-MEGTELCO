@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">✏️ Edit Dadus Likidasaun : Instalasaun</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('likidasaun_instalasaun.update', $LikIns->id) }}" method="POST">
                @csrf
                @method('PUT')

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
                    <label for="data" class="form-label">📅 Data Likidasaun</label>
                    <input type="date" id="data" name="data" class="form-control" value="{{ old('data', $LikIns->data) }}" required>
                </div>

                {{-- <div class="mb-3">
                    <label for="invoice_installs_id" class="form-label">👤 Selu Husi Kliente</label>
                    <select id="invoice_installs_id" name="invoice_installs_id" class="form-control" required onchange="loadInvoiceData(this.value)">
                        <option value="" disabled>Hili Kliente</option>
                        @foreach ($invoiceInstalls as $install)
                            <option value="{{ $install->id }}" {{ $install->id == $LikIns->invoice_installs_id ? 'selected' : '' }}>
                                {{ $install->naran }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="mb-3">
                    <label class="form-label">👤 Kliente</label>
                    <input type="text" class="form-control" value="{{ $LikIns->naran }}" readonly>
                    <input type="hidden" name="invoice_installs_id" value="{{ $LikIns->invoice_installs_id }}">
                </div>

                <div class="mb-3">
                    <label for="deskrisaun" class="form-label">📝 Deskrisaun</label>
                    <input type="text" id="deskrisaun" name="deskrisaun" class="form-control" value="{{ old('deskrisaun', $LikIns->deskrisaun) }}" placeholder="Deskrisaun sei preense automátiku" required readonly>
                </div>

                <div class="mb-3">
                    <label for="metodu_pagamentu_id" class="form-label">💳 Metodu Pagamentu</label>
                    <select id="metodu_pagamentu_id" name="metodu_pagamentu_id" class="form-control" required>
                        <option value="" disabled>Hili Metodu Pagamentu</option>
                        @foreach ($metodu_pagamentus as $metodu)
                            <option value="{{ $metodu->id }}" {{ $metodu->id == $LikIns->metodu_pagamentu_id ? 'selected' : '' }}>
                                {{ $metodu->metodu_selu }}
                            </option>
                        @endforeach
                    </select>
                </div>
{{-- 
                <div class="mb-3">
                    <label class="form-label">💰 Montante</label>
                    <input type="number"class="form-control" value="{{ $LikIns->montante }}" readonly>
                    <input type="hidden" name="invoice_installs_id" value="{{ $LikIns->invoice_installs_id }}">
                </div> --}}
                <div class="mb-3">
                    <label for="montante" class="form-label">💰 Montante</label>
                    <input type="number" id="montante" name="montante" class="form-control" value="{{ old('montante', $LikIns->montante) }}" readonly>
                    <small class="text-muted">Montante labele muda, montante ne'e husi invoice instalasaun.</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Update Dadus</button>
                    <a href="{{ route('likidasaun_instalasaun.dadusLikInstall') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function loadInvoiceData(invoiceInstallId) {
    if (invoiceInstallId) {
        fetch(`/get-invoice-install-data/${invoiceInstallId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('deskrisaun').value = data.deskrisaun || 'Pagamentu ba Instalasaun Internet';
                document.getElementById('montante').value = data.total || data.subtotal;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}
</script>
@endsection
