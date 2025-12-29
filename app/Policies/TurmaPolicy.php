<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Turma;

class TurmaPolicy
{
    public function viewAny(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function view(User $user, Turma $turma)
    {
        return $user->perfil === 'admin';
    }

    public function create(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function update(User $user, Turma $turma)
    {
        return $user->perfil === 'admin';
    }

    public function delete(User $user, Turma $turma)
    {
        return $user->perfil === 'admin';
    }
}
