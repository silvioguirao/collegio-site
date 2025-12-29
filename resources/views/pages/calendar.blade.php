@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Calendário']]" />
    <h1 class="text-3xl font-bold">Calendário Escolar</h1>
    <x-section>
        <p>Agenda e eventos — placeholder.</p>
    </x-section>
@endsection
