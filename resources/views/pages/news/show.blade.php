@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Notícias','url'=>'/noticias'], ['label'=>$post['title']]]" />
    <h1 class="text-3xl font-bold">{{ $post['title'] }}</h1>
    <x-section>
        <div class="text-sm text-gray-600">Publicado por {{ $post['author'] ?? 'Equipe' }} em {{ $post['published_at']->format('d/m/Y') ?? now()->format('d/m/Y') }}</div>
        <div class="mt-4">{{ $post['body'] }}</div>
    </x-section>
@endsection
