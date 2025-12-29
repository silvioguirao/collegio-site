<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Boletim;
use App\Models\User;

class TestBoletimSeeder extends Seeder
{
    public function run(): void
    {
        $aluno = User::where('perfil', 'aluno')->first();
        if (! $aluno) {
            $aluno = User::create([
                'name' => 'Aluno Teste',
                'nome' => 'Aluno Teste',
                'email' => 'aluno@colegio.com',
                'password' => \Illuminate\Support\Facades\Hash::make('senha123'),
                'perfil' => 'aluno',
                'status' => 'ativo',
            ]);
        }

        Boletim::firstOrCreate([
            'aluno_id' => $aluno->id,
            'periodo' => '1º bimestre'
        ], [
            'notas' => ['matematica' => 8.5, 'portugues' => 9.0],
            'observacoes' => 'Boletim de teste'
        ]);
    }
}
