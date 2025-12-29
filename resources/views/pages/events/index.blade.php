@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Eventos']]" />
    <h1 class="text-3xl font-bold">Eventos</h1>
    <x-section>
        @foreach($events as $e)
            <x-card title="{{ $e['title'] }}">{{ $e['date']->format('d/m/Y') ?? now()->format('d/m/Y') }} - <a href="/eventos/{{ $e['id'] }}">ver</a></x-card>
        @endforeach
    </x-section>
@endsection
