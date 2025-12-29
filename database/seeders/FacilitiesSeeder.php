<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitiesSeeder extends Seeder
{
    public function run(): void
    {
        Facility::create(['name'=>'Biblioteca','description'=>'Acervo para alunos e professores.','gallery'=>[]]);
        Facility::create(['name'=>'Laboratório de Ciências','description'=>'Equipado para aulas práticas.','gallery'=>[]]);
    }
}
