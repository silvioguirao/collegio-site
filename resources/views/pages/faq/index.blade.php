@extends('layouts.app')

@section('content')
    @push('head')
        <link rel="canonical" href="{{ url()->current() }}" />
    @endpush
    <x-breadcrumb :items="[['label'=>'Início','url'=>'/'], ['label'=>'FAQ']]" />
    <h1 class="text-3xl font-bold">Perguntas Frequentes (FAQ)</h1>
    <x-section>
        @foreach($items as $it)
            <x-card title="{{ $it['question'] }}">{{ $it['answer'] }}</x-card>
        @endforeach
    </x-section>
@endsection
