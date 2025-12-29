<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeachersSeeder extends Seeder
{
    public function run(): void
    {
        Teacher::factory()->createMany([
            ['name'=>'Maria Silva','formation'=>'Mestrado em Matemática','area'=>'Matemática','bio'=>'Especialista em didática e pedagogia ativa.'],
            ['name'=>'João Souza','formation'=>'Licenciatura em Português','area'=>'Português','bio'=>'Atua com leitura e produção textual.'],
        ]);
    }
}
