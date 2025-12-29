<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $items = [
            ['question'=>'Como matricular meu filho?','answer'=>'Siga as instruções na página de matrículas.'],
        ];
        $meta = ['title'=>'FAQ - '.config('app.name'),'meta_description'=>'Perguntas frequentes.'];
        return view('pages.faq.index', compact('items'))->with($meta);
    }
}
