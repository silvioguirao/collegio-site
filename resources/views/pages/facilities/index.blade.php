@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Infraestrutura']]" />
    <h1 class="text-3xl font-bold">Infraestrutura</h1>
    <x-section>
        @foreach($facilities as $f)
            <x-card title="{{ $f['name'] }}">{{ $f['description'] }} - <a href="/infraestrutura/{{ $f['id'] }}">ver</a></x-card>
        @endforeach
    </x-section>
@endsection
