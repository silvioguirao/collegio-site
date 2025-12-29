<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsPost;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title'=>'Início do Ano Letivo','slug'=>'inicio-ano-letivo','excerpt'=>'Abertura do ano letivo com cerimônia.','body'=>'Detalhes sobre a cerimônia de abertura.','author'=>'Admin','published_at'=>now()->subDays(10)],
            ['title'=>'Semana Cultural','slug'=>'semana-cultural','excerpt'=>'Atividades culturais e apresentações.','body'=>'Programação da semana cultural.','author'=>'Coordenação','published_at'=>now()->subDays(5)],
            ['title'=>'Concurso de Redação','slug'=>'concurso-redacao','excerpt'=>'Resultados do concurso de redação.','body'=>'Lista dos vencedores e menções honrosas.','author'=>'Departamento de Português','published_at'=>now()->subDays(2)],
        ];

        foreach ($items as $data) {
            NewsPost::updateOrCreate([
                'slug' => $data['slug'],
            ], $data);
        }
    }
}
