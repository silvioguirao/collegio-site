<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turma;
use App\Models\MaterialDidatico;
use Illuminate\Support\Facades\Storage;

class TestMaterialSeeder extends Seeder
{
    public function run(): void
    {
        $turma = Turma::first();
        if (! $turma) {
            $turma = Turma::create(['nome' => '1º Ano A', 'ano_letivo' => '2025']);
        }

        // ensure placeholder file exists
        Storage::disk('public')->put('uploads/materials/test.pdf', '');

        MaterialDidatico::firstOrCreate([
            'titulo' => 'Material de Teste'
        ], [
            'descricao' => 'PDF de teste',
            'arquivo' => 'uploads/materials/test.pdf',
            'turma_id' => $turma->id,
            'status' => 'publicado',
        ]);
    }
}
