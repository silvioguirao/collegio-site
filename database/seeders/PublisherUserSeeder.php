<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PublisherUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'publicador@colegio.com',
        ], [
            'nome' => 'Publicador Teste',
            'name' => 'Publicador Teste',
            'perfil' => 'publicador',
            'status' => 'ativo',
            'password' => Hash::make('senha123'),
        ]);
    }
}
