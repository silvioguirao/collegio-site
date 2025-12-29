<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MaterialDidatico;

class MaterialDidaticoPolicy
{
    public function viewAny(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function view(User $user, MaterialDidatico $material)
    {
        return $user->perfil === 'admin';
    }

    public function create(User $user)
    {
        return $user->perfil === 'admin';
    }

    public function update(User $user, MaterialDidatico $material)
    {
        return $user->perfil === 'admin';
    }

    public function delete(User $user, MaterialDidatico $material)
    {
        return $user->perfil === 'admin';
    }
}
