<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Image;

class TestImageSeeder extends Seeder
{
    public function run(): void
    {
        $admin = \App\Models\User::where('perfil', 'admin')->first();

        $page = Page::first();
        if (! $page) {
            $page = Page::create([
                'titulo' => 'Página de Teste',
                'conteudo' => 'Conteúdo de teste',
                'slug' => 'pagina-de-teste',
                'status' => 'publicado',
                'autor_id' => $admin ? $admin->id : null,
            ]);
        }

        Image::firstOrCreate([
            'arquivo' => 'uploads/imagens/teste.jpg',
            'pagina_id' => $page->id,
        ], [
            'descricao' => 'Imagem de teste',
        ]);
    }
}
