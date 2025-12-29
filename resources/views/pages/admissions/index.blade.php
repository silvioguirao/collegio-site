@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Matrículas']]" />
    <h1 class="text-3xl font-bold">Matrículas</h1>
    <x-section>
        <p>{{ $content['instructions'] ?? 'Instruções de matrícula.' }}</p>
        <x-button class="mt-4">Baixar edital (placeholder)</x-button>
    </x-section>
@endsection
