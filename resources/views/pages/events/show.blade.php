@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Eventos','url'=>'/eventos'], ['label'=>$event['title']]]" />
    <h1 class="text-3xl font-bold">{{ $event['title'] }}</h1>
    <x-section>
        <p>{{ $event['description'] }}</p>
    </x-section>
@endsection
