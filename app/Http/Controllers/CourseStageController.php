<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseStageController extends Controller
{
    protected array $stages = [
        'fundamental-1' => ['name'=>'Fundamental I','years'=>'1º ao 5º ano','slug'=>'fundamental-1'],
        'fundamental-2' => ['name'=>'Fundamental II','years'=>'6º ao 9º ano','slug'=>'fundamental-2'],
        'ensino-medio' => ['name'=>'Ensino Médio','years'=>'1ª à 3ª série','slug'=>'ensino-medio'],
        'pre-vestibular' => ['name'=>'Curso Pré-Vestibular','years'=>'Pré-vestibular','slug'=>'pre-vestibular'],
    ];

    public function show(Request $request)
    {
        $slug = $request->route('slug') ?? $request->defaults('slug');
        $stage = $this->stages[$slug] ?? null;
        if (! $stage) return abort(404);
        $meta = ['title' => $stage['name'].' - '.config('app.name'), 'meta_description' => $stage['years']];
        return view('pages.stage', ['stage'=>$stage])
            ->with($meta);
    }
}
