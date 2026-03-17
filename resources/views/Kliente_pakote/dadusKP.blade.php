@extends('layouts.main')

@section('container')

<div class="container mt-4">
    <div class="d-flex align-items-center gap-2 mb-3">
        <a href="{{ route('kliente_pakote.rejistuKP') }}" class="btn btn-success">➕REJISTU KLIENTE : PAKOTE</a>
        <a href="{{ route('kliente_pakote.report') }}" class="btn btn-info">PRINT RELATORIU</a>
        @if(session('susesu'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Search Form -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('kliente_pakote.dadusKP') }}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" 
                                   placeholder="Buka husi Naran, Nu. Ref, ka Nu. Telefone" 
                                   value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">Buka</button>
                            @if(request('search'))
                                <a href="{{ route('kliente_pakote.dadusKP') }}" class="btn btn-outline-secondary">Hamoos</a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nu. Referensia</th>
                    <th>Data</th>
                    <th>Kliente</th>
                    <th>Nu. Telefone</th>
                    <th>Lokal</th>
                    <th>Pakote</th>
                    <th>Kapasidade (Mbps)</th>
                    <th>Presu Pakote</th>
                    <th>Presu Instalasaun</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kp as $kp1)
                    <tr style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f5f5f5'" onmouseout="this.style.backgroundColor=''">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kp1->nu_ref }}</td>
                        <td>{{ \Carbon\Carbon::parse($kp1->data)->format('d-m-Y') }}</td>
                        <td>{{ $kp1->naran }}</td>
                        <td>{{ $kp1->nu_telfone }}</td>
                        <td>{{ $kp1->residensia }}</td>
                        <td>{{ $kp1->pakote->pakote ?? '-' }}</td>
                        <td>{{ $kp1->kapasidade }}</td>
                        <td>${{ $kp1->presu_pakote }}</td>
                        <td>${{ $kp1->presu_instalasaun }}</td>
                        <td>
                            <form action="{{ route('kliente_pakote.updateStatus', $kp1->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="{{ $kp1->status == 'active' ? 'inactive' : 'active' }}">
                                <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent">
                                    @if($kp1->status == 'active')
                                        <span class="badge bg-success rounded-pill px-3 py-1">Active</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill px-3 py-1">Inactive 
                                            (since {{ \Carbon\Carbon::parse($kp1->updated_at)->format('d M Y') }})</span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('kliente_pakote.edit', $kp1->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('kliente_pakote.destroy', $kp1->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos dadus kliente?')">Hamoos</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Dadus laiha</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection