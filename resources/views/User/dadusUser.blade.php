@extends('layouts.main')

@section('container')
<div class="container mt-4">
    
    <a href="{{ route('user.rejistuUser') }}" class="btn btn-success mb-3">➕ REJISTU USER</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="overflow-x: auto; border: 1px solid #dee2e6; border-radius: 5px; padding: 10px;">
        <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>Naran</th>
                <th>Email</th>
                <th>Password</th>
                {{-- <th>Password display</th> --}}
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $tipu)
                <tr>
                    {{-- <td>{{ $tipu->id }}</td> --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tipu->name }}</td>
                    <td>{{ $tipu->email }}</td>
                    <td>{{ $tipu->password }}</td>
                    {{-- <td>{{ $tipu->display_password }}</td> --}}
                    <td>{{ $tipu->role }}</td>
                    <td>
                        {{-- <a href="{{ route('User.edit', $tipu->id) }}" class="btn btn-sm btn-info">Edit</a> --}}

                        <form action="{{ route('user.destroy', $tipu->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hamoos user nee?')">Hamoos</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
