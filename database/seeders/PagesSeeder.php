<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['title'=>'Início','slug'=>'home','content'=>'Conteúdo inicial do site.','meta_title'=>'Início - '.config('app.name'),'meta_description'=>'Página inicial.'],
            ['title'=>'Sobre','slug'=>'sobre','content'=>'Missão, visão e valores.','meta_title'=>'Sobre - '.config('app.name'),'meta_description'=>'Sobre o colégio.'],
            ['title'=>'Política de Privacidade','slug'=>'politica-privacidade','content'=>'Política e LGPD.','meta_title'=>'Privacidade - '.config('app.name'),'meta_description'=>'Política de privacidade.'],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug'=>$p['slug']], $p);
        }
    }
}
