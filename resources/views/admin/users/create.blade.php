@extends('layouts.app')

@section('content')
<div class="container max-w-lg mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h1>Criar usuário</h1>
        <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-600">&larr; Voltar</a>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 p-3 mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-red-700">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="mb-3">
            <label class="block text-sm font-medium">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium">Senha</label>
            <input type="password" name="password" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium">Confirmar senha</label>
            <input type="password" name="password_confirmation" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium">Role</label>
            <select name="role" class="border rounded w-full p-2" required>
                <option value="aluno">Aluno</option>
                <option value="publico">Público</option>
                <option value="publicador">Publicador</option>
                <option value="administrador">Administrador</option>
            </select>
        </div>

        <div class="flex items-center gap-2">
            <button class="bg-green-600 text-white px-4 py-2 rounded">Criar</button>
            <a href="{{ route('admin.users.index') }}" class="text-gray-600">Cancelar</a>
        </div>
    </form>
</div>
@endsection
