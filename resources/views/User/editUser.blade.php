@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">✏️ EDIT USER</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('User.update', $user->id) }}" method="POST">
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
                    <label for="name" class="form-label">Naran</label>
                    <input type="text" id="name" name="name" class="form-control" 
                           value="{{ old('name', $user->name) }}" required>
                </div> 
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           value="{{ old('email', $user->email) }}" required>
                </div> 
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password </label>
                    <input type="text" id="password" name="password" class="form-control" 
                           value="{{ $user->plain_password }}" placeholder="Password saat ini">
                </div> 
                
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="superadmin" @if(old('role', $user->role) == 'superadmin') selected @endif>Super Admin</option>
                        <option value="admin" @if(old('role', $user->role) == 'admin') selected @endif>Admin</option>
                        <option value="finance" @if(old('role', $user->role) == 'finance') selected @endif>Finance</option>
                        <option value="director" @if(old('role', $user->role) == 'director') selected @endif>Director</option>
                    </select>
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">💾 Hadia</button>
                    <a href="{{ route('user.dadusUser') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection