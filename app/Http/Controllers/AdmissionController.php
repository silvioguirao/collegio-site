<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index()
    {
        $meta = ['title'=>'Matrículas - '.config('app.name'),'meta_description'=>'Processo e documentação para matrícula.'];
        $content = ['instructions'=>'Procedimento de matrícula e links para formulários.'];
        return view('pages.admissions.index', compact('content'))->with($meta);
    }
}
