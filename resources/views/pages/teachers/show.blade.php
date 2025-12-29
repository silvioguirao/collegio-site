@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Corpo Docente','url'=>'/corpo-docente'], ['label'=>$teacher['name']]]" />
    <h1 class="text-3xl font-bold">{{ $teacher['name'] }}</h1>
    <x-section>
        <p><strong>Área:</strong> {{ $teacher['area'] }}</p>
        <p>{{ $teacher['bio'] }}</p>
    </x-section>
@endsection
