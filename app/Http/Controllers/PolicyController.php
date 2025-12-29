<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function privacy()
    {
        $meta = ['title'=>'Política de Privacidade - '.config('app.name'),'meta_description'=>'Política de privacidade e tratamento de dados (LGPD).'];
        return view('pages.policies.privacy')->with($meta);
    }
}
