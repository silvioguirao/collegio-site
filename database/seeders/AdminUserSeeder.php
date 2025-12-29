<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@colegio.com');
        $name = env('ADMIN_NAME', 'Administrador');
        $password = env('ADMIN_PASSWORD', 'senha123');

        $user = User::where('email', $email)->first();
        if (! $user) {
            User::create([
                'name' => $name,
                'nome' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'perfil' => 'admin',
                'status' => 'ativo',
            ]);
        } else {
            $user->update([
                'perfil' => 'admin',
                'status' => 'ativo',
                'nome' => $name,
                'name' => $name,
            ]);
        }
    }
}
