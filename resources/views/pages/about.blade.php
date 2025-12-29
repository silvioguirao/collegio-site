@extends('layouts.app')

@section('content')
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Sobre']]" />

    <x-section title="Sobre o Colégio">
        <p>Missão, visão e valores — conteúdo placeholder em PT-BR.</p>
    </x-section>
@endsection
