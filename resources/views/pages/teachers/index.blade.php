@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Corpo Docente']]" />
    <h1 class="text-3xl font-bold">Corpo Docente</h1>
    <x-section>
        @foreach($teachers as $t)
            <x-card title="{{ $t['name'] }}">Área: {{ $t['area'] }} - <a href="/corpo-docente/{{ $t['id'] }}" class="text-blue-600">ver</a></x-card>
        @endforeach
    </x-section>
@endsection
