@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl mb-4">Área administrativa — Login</h1>

    @if(session('error'))
        <div class="mb-4 text-red-600">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="mb-4 text-red-600">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium">Email</label>
            <input name="email" type="email" value="{{ old('email') }}" required class="w-full border rounded px-3 py-2" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Senha</label>
            <input name="password" type="password" required class="w-full border rounded px-3 py-2" />
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Entrar</button>
        </div>
    </form>
</div>
@endsection
