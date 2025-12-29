@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush

    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Notícias']]" />
    <h1 class="text-3xl font-bold">Notícias</h1>
    <x-section>
        @foreach($posts as $post)
            <x-card title="{{ $post['title'] }}">
                <p>{{ $post['excerpt'] }}</p>
                <a href="/noticias/{{ $post['slug'] }}" class="text-blue-600 hover:underline">Ler</a>
            </x-card>
        @endforeach
    </x-section>
@endsection
