<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = [
            ['id'=>1,'name'=>'Prof. Maria Silva','area'=>'Matemática'],
            ['id'=>2,'name'=>'Prof. João Souza','area'=>'Português'],
        ];
        $meta = ['title'=>'Corpo Docente - '.config('app.name'),'meta_description'=>'Conheça nossos professores.'];
        return view('pages.teachers.index', compact('teachers'))->with($meta);
    }

    public function show($id)
    {
        $teacher = ['id'=>$id,'name'=>'Prof. Maria Silva','bio'=>'Breve biografia do docente.','area'=>'Matemática'];
        $meta = ['title'=>$teacher['name'].' - '.config('app.name'),'meta_description'=>substr($teacher['bio'],0,150)];
        return view('pages.teachers.show', compact('teacher'))->with($meta);
    }
}
