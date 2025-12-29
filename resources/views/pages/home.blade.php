@extends('layouts.app')

@section('content')
        <x-breadcrumb :items="[['label'=>'Início']]" />

        <x-carousel :slides="[
                ['image' => 'https://picsum.photos/1200/600?random=11', 'title' => 'Infraestrutura moderna', 'caption' => 'Ambientes preparados para o aprendizado'],
                ['image' => 'https://picsum.photos/1200/600?random=12', 'title' => 'Atividades extracurriculares', 'caption' => 'Esporte, arte e tecnologia'],
                ['image' => 'https://picsum.photos/1200/600?random=13', 'title' => 'Equipe dedicada', 'caption' => 'Professores qualificados e apaixonados']
        ]" />

        <x-section title="Bem-vindo ao Colégio Exemplo">
                <p>Somos um colégio comprometido com a formação integral dos estudantes. Atendemos Fundamental I, Fundamental II, Ensino Médio e Pré-Vestibular.</p>
                <x-button class="mt-4">Saiba mais</x-button>
        </x-section>

        <x-section title="Notícias recentes">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <x-card title="Notícia exemplo">Resumo curto da notícia de exemplo.</x-card>
                        <x-card title="Notícia exemplo">Resumo curto da notícia de exemplo.</x-card>
                        <x-card title="Notícia exemplo">Resumo curto da notícia de exemplo.</x-card>
                </div>
        </x-section>
@endsection
