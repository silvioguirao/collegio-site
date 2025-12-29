<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseStage;

class CourseStagesSeeder extends Seeder
{
    public function run(): void
    {
        $stages = [
            ['name'=>'Fundamental I','slug'=>'fundamental-1','years'=>'1º ao 5º ano','description'=>'Ensino fundamental inicial.','differentials'=>'Formação básica e projetos.'],
            ['name'=>'Fundamental II','slug'=>'fundamental-2','years'=>'6º ao 9º ano','description'=>'Ensino fundamental II.','differentials'=>'Preparação interdisciplinar.'],
            ['name'=>'Ensino Médio','slug'=>'ensino-medio','years'=>'1ª à 3ª série','description'=>'Ensino médio com foco em aprofundamento.','differentials'=>'Pré-vestibular integrado.'],
            ['name'=>'Curso Pré-Vestibular','slug'=>'pre-vestibular','years'=>'Pré-vestibular','description'=>'Curso intensivo para vestibulares.','differentials'=>'Aulas específicas e simulados.'],
        ];

        foreach ($stages as $s) {
            CourseStage::updateOrCreate(['slug'=>$s['slug']], $s);
        }
    }
}
