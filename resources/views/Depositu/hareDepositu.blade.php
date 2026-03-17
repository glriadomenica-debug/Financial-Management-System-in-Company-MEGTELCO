@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="d-flex align-items-center gap-2 mb-3">
        <a href="{{ route('depositu.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>  AUMENTA DADUS DEPOSITU
        </a>
        <div class="btn-group">
            <a href="{{ route('depositu.reportBrangkas') }}" class="btn btn-info">
                <i class="fas fa-print"></i> RELATORIU BRANGKAS
            </a>
        </div>
        <div>
            <a href="{{ route('depositu.reportHTM') }}" class="btn btn-info">
                <i class="fas fa-print"></i> RELATORIU HTM
            </a>
        </div>
        <div>
            <a href="{{ route('depositu.reportBNU') }}" class="btn btn-info">
                <i class="fas fa-print"></i> RELATORIU BNU
            </a>
        </div>   

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Data</th>
                    <th>Husi</th>
                    <th>Ba</th>
                    <th>Montante</th>
                    <th>Tipu</th>
                    <th>Deskrisaun</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($depositus as $dp)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($dp->data_depositu)->format('d-m-Y') }}</td>
                        <td>{{ $dp->tipu_depositu_husi ? $dp->tipu_depositu_husi->tipu_depositu : 'N/A' }}</td>
                        <td>{{ $dp->tipu_depositu_ba ? $dp->tipu_depositu_ba->tipu_depositu : 'N/A' }}</td>
                        <td>${{ number_format($dp->montante, 2) }}</td>
                        {{-- <td>
                            @if($dp->levantamento)
                                <span class="badge bg-danger">Levantamento</span>
                            @elseif($dp->bank_charge)
                                <span class="badge bg-danger">Bank Charge</span>
                            @else
                                <span class="badge bg-success">Depositu</span>
                            @endif
                        </td> --}}
                       <td>
                            @if($dp->bank_charge === 1 || $dp->bank_charge === true)
                                <span class="badge bg-danger">Bank Charge</span>
                            @elseif($dp->levantamento === 1 || $dp->levantamento === true)
                                <span class="badge bg-warning">Levantamento</span>
                            @else
                                <span class="badge bg-success">Depositu</span>
                            @endif
                        </td>
                        <td>{{ $dp->deskrisaun }}</td>
                        <td>
                            <a href="{{ route('depositu.edit', $dp->id) }}" class="btn btn-sm btn-info" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('depositu.destroy', $dp->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Ita boot hakarak hamoos dadus depositu ida nee?')"
                                    title="Hamoos">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection