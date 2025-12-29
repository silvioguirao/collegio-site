<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $posts = [
            ['title'=>'Notícia de Exemplo','slug'=>'noticia-exemplo','excerpt'=>'Resumo da notícia.','published_at'=>now()],
        ];
        $meta = ['title'=>'Notícias - '.config('app.name'),'meta_description'=>'Últimas notícias e comunicados.'];
        return view('pages.news.index', compact('posts'))->with($meta);
    }

    public function show($slug)
    {
        $post = ['title'=>'Notícia de Exemplo','slug'=>$slug,'body'=>'Conteúdo da notícia em placeholder.','author'=>'Admin','published_at'=>now()];
        $meta = ['title'=>$post['title'].' - '.config('app.name'),'meta_description'=>substr($post['body'],0,150)];
        return view('pages.news.show', compact('post'))->with($meta);
    }
}
