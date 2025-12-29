@extends('layouts.app')

@section('content')
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'Etapas','url'=>'/etapas'], ['label'=>$stage['name']]]" />

    <x-section :title="$stage['name']">
        <p>{{ $stage['description'] ?? 'Descrição da etapa.' }}</p>
    </x-section>
@endsection
