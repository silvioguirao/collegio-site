@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow text-center">
    <div class="flex flex-col items-center gap-4">
        <svg class="w-16 h-16 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11c.828 0 1.5.672 1.5 1.5S12.828 14 12 14s-1.5-.672-1.5-1.5S11.172 11 12 11z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 11V9a5 5 0 10-10 0v2" />
            <rect x="3" y="11" width="18" height="8" rx="2" />
        </svg>

        <h1 class="text-2xl font-semibold">Acesso negado</h1>

        @if(session('error'))
            <div class="mb-2 text-red-600">{{ session('error') }}</div>
        @endif

        <p class="text-gray-700">Você não tem permissões suficientes para acessar esta área administrativa.</p>

        <div class="flex justify-center gap-3 mt-4">
            <a href="{{ url('/admin') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Fazer login</a>
            <a href="/" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">Voltar ao site</a>
        </div>
    </div>
</div>
@endsection
