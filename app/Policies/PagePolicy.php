<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;

class PagePolicy
{
    public function viewAny(User $user)
    {
        return $user->perfil === 'admin' || $user->perfil === 'publicador';
    }

    public function view(User $user, Page $page)
    {
        return $user->perfil === 'admin' || $user->perfil === 'publicador';
    }

    public function create(User $user)
    {
        return $user->perfil === 'admin' || $user->perfil === 'publicador';
    }

    public function update(User $user, Page $page)
    {
        return $user->perfil === 'admin' || ($user->perfil === 'publicador' && $page->autor_id === $user->id);
    }

    public function delete(User $user, Page $page)
    {
        return $user->perfil === 'admin' || ($user->perfil === 'publicador' && $page->autor_id === $user->id);
    }
}
