@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">➕ REJISTU USER</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
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
                    <label for="tipu_transaksaun" class="form-label">📜 Tipu Transaksaun</label>
                    <input type="text" id="tipu_transaksaun" name="tipu_transaksaun" class="form-control" 
                    value="{{ old('tipu_transaksaun') }}" placeholder="Insere tipu transaksaun" required>
                </div> --}}
                
                <div class="mb-3">
                    <label for="name" class="form-label">Naran</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="naran" required>
                </div> 
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email" required>
                </div> 
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="password" required>
                </div> 
                

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="" disabled selected>Hili Role</option>
                        <option value="superadmin" @if(old('role') == 'superadmin') selected @endif>Super Admin</option>
                        <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
                        <option value="finansas" @if(old('role') == 'finansas') selected @endif>Finansas</option>
                        <option value="diretor" @if(old('role') == 'diretor') selected @endif>Diretor</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Rai Dadus</button>
                    <a href="{{ route('user.dadusUser') }}" class="btn btn-secondary">⬅️ Fila</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
