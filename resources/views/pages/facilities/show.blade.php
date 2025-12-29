@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Infraestrutura','url'=>'/infraestrutura'], ['label'=>$facility['name']]]" />
    <h1 class="text-3xl font-bold">{{ $facility['name'] }}</h1>
    <x-section>
        <p>{{ $facility['description'] }}</p>
    </x-section>
@endsection
