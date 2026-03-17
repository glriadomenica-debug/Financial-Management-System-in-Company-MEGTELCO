@extends('layouts.main')

@section('container')

<div class="container mt-4">

    <div class="d-flex align-items-center gap-2 mb-3">
        <a href="{{ route('despeza.aumentaDespeza') }}" class="btn btn-success">➕AUMENTA DADUS DESPEZA</a>
        {{-- <a href="{{ route('despeza.tiputransaksaun') }}" class="btn btn-danger">➕REJISTU TIPU TRANSAKSAUN</a> --}}
        {{-- <button class="btn btn-primary">📄PRINT PDF</button>
        <button class="btn btn-primary">📄PRINT EXCEL</button> --}}
        <a href="{{ route('despeza.report') }}" class="btn btn-info">PRINT RELATORIU</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Data</th>
                    <th>Tipu Transaksaun</th>
                    <th>Montante</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                // $totalPresu = 0;
                $totalMontante = 0;
            @endphp
                @foreach ($despezas as $despeza)
                @php
                $totalMontante += $despeza->montante;
                // $totalOsanTama = $despeza->$totalOsanTama ??0 ;
                // $totalOsanTama = 0;

            @endphp
                    <tr>
                        {{-- <td>{{ $despeza->id }}</td> --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($despeza->data)->format('d-m-Y') }}</td>
                        <td>{{ $despeza->tipuTransaksaun->tipu_transaksaun }}</td>
                        <td>${{ $despeza->montante }}</td>
                        <td>
                            <a href="{{ route('despeza.edit', $despeza->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('despeza.destroy', $despeza->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos dadus despeza?')">Hamoos</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th colspan="3" class="text-end">Total gastus:</th>
                    
                    <th>${{ number_format($totalMontante, 2, ',', '.') }}</th>
                    <th></th>
                </tr>
                {{-- <tr>
                    <th colspan="3" class="text-end">Total osan tama:</th>
                    <th>${{ number_format($totalOsanTama, 2, ',', '.') }}</th>
                    <th></th>
                </tr> --}}
                <tr>
                    <th colspan="3" class="text-end">Balansu :</th>
                    <th>${{ number_format($totalOsanTama - $totalMontante, 2, ',', '.') }}</th>

                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>

@endsection
