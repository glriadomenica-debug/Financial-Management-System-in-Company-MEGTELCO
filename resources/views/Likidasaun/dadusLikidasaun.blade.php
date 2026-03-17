@extends('layouts.main')

@section('container')

<div class="container mt-4">

    <div class="d-flex align-items-center gap-2 mb-3">
        <a href="{{ route('likidasaun.aumentaLikidasaun') }}" class="btn btn-success">➕ AUMENTA DADUS LIKIDASAUN</a>
        {{-- <button class="btn btn-primary">📄 PRINT PDF</button>
        <button class="btn btn-primary">📄 PRINT EXCEL</button> --}}
        <a href="{{ route('likidasaun.report') }}" class="btn btn-info">PRINT RELATORIU</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
    {{-- <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered"> --}}
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Data Likidasaun</th>
                    <th>Selu husi Kliente</th>
                    <th>Deskrisaun</th>
                    <th>Metodu Pagamentu</th>
                    <th>Presu / Fulan</th>
                    <th>Montante selu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPresu = 0;
                    $totalMontante = 0;
                @endphp

                @foreach ($likidasauns as $likidasaun)
                    @php
                        $totalPresu += $likidasaun->montante;
                        $totalMontante += $likidasaun->selu;
                    @endphp
                    <tr>
                        {{-- <td>{{ $likidasaun->id }}</td> --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($likidasaun->data_likidasaun)->format('d-m-Y') }}</td>
                        <td>{{ $likidasaun->naran ?? 'N/A' }}</td>
                        <td>{{ $likidasaun->deskrisaun }}</td>
                        <td>
                            {{ $likidasaun->metoduPagamentu ? $likidasaun->metoduPagamentu->metodu_selu : 'N/A' }}
                        </td>
                        <td>${{ number_format($likidasaun->montante, 2, ',', '.') }}</td>
                        <td>${{ number_format($likidasaun->selu, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('likidasaun.edit', $likidasaun->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('likidasaun.destroy', $likidasaun->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos dadus likidasaun?')">Hamoos</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="5" class="text-end">Total Expected Income:</th>
                    <th>${{ number_format($totalPresu, 2, ',', '.') }}</th>
                    {{-- <th>${{ number_format($totalMontante, 2, ',', '.') }}</th> --}}
                    <th></th>
                </tr>
                <tr>
                    <th colspan="5" class="text-end">Total Income:</th>
                    <th></th>
                    <th>${{ number_format($totalMontante, 2, ',', '.') }}</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>

@endsection
