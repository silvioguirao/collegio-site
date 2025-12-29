@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Contato']]" />
    <h1 class="text-3xl font-bold">Contato</h1>
    <x-section>
        <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
            @csrf
            <input type="text" name="hp" style="display:none" />
            <div>
                <label class="block text-sm">Nome</label>
                <input name="name" required class="border p-2 w-full" />
            </div>
            <div>
                <label class="block text-sm">Email</label>
                <input name="email" type="email" required class="border p-2 w-full" />
            </div>
            <div>
                <label class="block text-sm">Telefone</label>
                <input name="phone" class="border p-2 w-full" />
            </div>
            <div>
                <label class="block text-sm">Assunto</label>
                <input name="subject" required class="border p-2 w-full" />
            </div>
            <div>
                <label class="block text-sm">Mensagem</label>
                <textarea name="message" required class="border p-2 w-full"></textarea>
            </div>
            <div>
                <x-button type="submit">Enviar</x-button>
            </div>
        </form>
    </x-section>
@endsection
