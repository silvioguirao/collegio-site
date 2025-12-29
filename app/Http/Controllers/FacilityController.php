<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = [
            ['id'=>1,'name'=>'Biblioteca','description'=>'Acervo e espaço de leitura.'],
            ['id'=>2,'name'=>'Laboratório de Ciências','description'=>'Espaço para práticas.'],
        ];
        $meta = ['title'=>'Infraestrutura - '.config('app.name'),'meta_description'=>'Conheça nossas instalações.'];
        return view('pages.facilities.index', compact('facilities'))->with($meta);
    }

    public function show($id)
    {
        $facility = ['id'=>$id,'name'=>'Biblioteca','description'=>'Descrição detalhada da biblioteca.','gallery'=>[]];
        $meta = ['title'=>$facility['name'].' - '.config('app.name'),'meta_description'=>substr($facility['description'],0,150)];
        return view('pages.facilities.show', compact('facility'))->with($meta);
    }
}
