<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Image;

class TestEventSeeder extends Seeder
{
    public function run(): void
    {
        $admin = \App\Models\User::where('perfil', 'admin')->first();

        $image = Image::first();

        Event::firstOrCreate([
            'titulo' => 'Evento de Teste',
        ], [
            'titulo' => 'Evento de Teste',
            'title' => 'Evento de Teste',
            'descricao' => 'Descrição do evento de teste',
            'description' => 'Descrição do evento de teste',
            'data_evento' => now()->addDays(7),
            'date' => now()->addDays(7),
            'imagem_id' => $image ? $image->id : null,
            'status' => 'publicado',
            'autor_id' => $admin ? $admin->id : null,
            'slug' => 'evento-de-teste',
        ]);
    }
}
