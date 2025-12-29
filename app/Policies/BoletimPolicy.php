<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Boletim;

class BoletimPolicy
{
    public function viewAny(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function view(User $user, Boletim $boletim)
    {
        return $user->perfil === 'admin';
    }

    public function create(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function update(User $user, Boletim $boletim)
    {
        return $user->perfil === 'admin';
    }

    public function delete(User $user, Boletim $boletim)
    {
        return $user->perfil === 'admin';
    }
}
