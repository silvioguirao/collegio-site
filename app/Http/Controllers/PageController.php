<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $meta = ['title' => 'Início - '.config('app.name'), 'meta_description' => 'Página inicial do colégio.'];
        return view('pages.home')->with($meta);
    }

    public function about()
    {
        $meta = ['title' => 'Sobre - '.config('app.name'), 'meta_description' => 'Missão, visão e valores.'];
        return view('pages.about')->with($meta);
    }

    public function pedagogy()
    {
        $meta = ['title' => 'Proposta Pedagógica - '.config('app.name'), 'meta_description' => 'Metodologias e Avaliações.'];
        return view('pages.pedagogy')->with($meta);
    }

    public function calendar()
    {
        $meta = ['title' => 'Calendário - '.config('app.name'), 'meta_description' => 'Calendário escolar e agenda.'];
        return view('pages.calendar')->with($meta);
    }
}
