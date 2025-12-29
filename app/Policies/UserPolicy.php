<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function view(User $user, User $aluno)
    {
        return $user->perfil === 'admin';
    }

    public function create(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function update(User $user, User $aluno)
    {
        return $user->perfil === 'admin';
    }

    public function delete(User $user, User $aluno)
    {
        return $user->perfil === 'admin';
    }
}
