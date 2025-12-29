@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Políticas','url'=>'/politicas'], ['label'=>'Privacidade']]" />
    <h1 class="text-3xl font-bold">Política de Privacidade</h1>
    <x-section>
        <p>Política de privacidade e tratamento de dados (LGPD) - placeholder.</p>
    </x-section>
@endsection
