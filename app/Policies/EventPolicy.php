<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;

class EventPolicy
{
    public function viewAny(User $user)
    {
        return $user->perfil === 'admin' || $user->perfil === 'publicador';
    }

    public function view(User $user, Event $event)
    {
        return $user->perfil === 'admin' || $user->perfil === 'publicador';
    }

    public function create(User $user)
    {
        return $user->perfil === 'admin' || $user->perfil === 'publicador';
    }

    public function update(User $user, Event $event)
    {
        return $user->perfil === 'admin' || ($user->perfil === 'publicador' && $event->autor_id === $user->id);
    }

    public function delete(User $user, Event $event)
    {
        return $user->perfil === 'admin' || ($user->perfil === 'publicador' && $event->autor_id === $user->id);
    }
}
