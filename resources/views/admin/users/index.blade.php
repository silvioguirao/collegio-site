@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex items-center justify-between">
        <h1>Usuários</h1>
        <div class="flex items-center gap-2">
            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded">Criar usuário</a>
            @endif
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="bg-gray-200 text-gray-800 px-3 py-1 rounded">Sair</button>
            </form>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Role</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.update', $user) }}">
                            @csrf
                            @method('PUT')
                            <select name="role" class="form-control d-inline-block" style="width:180px">
                                <option value="aluno" {{ $user->role === 'aluno' ? 'selected' : '' }}>Aluno</option>
                                <option value="publico" {{ $user->role === 'publico' ? 'selected' : '' }}>Público</option>
                                <option value="publicador" {{ $user->role === 'publicador' ? 'selected' : '' }}>Publicador</option>
                                <option value="administrador" {{ $user->role === 'administrador' ? 'selected' : '' }}>Administrador</option>
                            </select>
                            <button class="btn btn-primary">Salvar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
