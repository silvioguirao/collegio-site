@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush

    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Proposta Pedagógica']]" />
    <h1 class="text-3xl font-bold">Proposta Pedagógica</h1>
    <x-section>
        <p>Metodologias, avaliações e princípios pedagógicos - conteúdo placeholder.</p>
    </x-section>
@endsection
