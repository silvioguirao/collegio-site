<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    public function run(): void
    {
        Event::factory()->createMany([
            ['title'=>'Reunião de Pais e Mestres','date'=>now()->addDays(7),'location'=>'Auditório','description'=>'Reunião para apresentação dos professores e atividades.'],
            ['title'=>'Feira de Ciências','date'=>now()->addDays(20),'location'=>'Quadra','description'=>'Apresentações de projetos dos alunos.'],
        ]);
    }
}
