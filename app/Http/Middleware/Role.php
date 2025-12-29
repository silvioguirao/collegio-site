<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $user = Auth::user();
        $rolesArray = explode('|', $roles);

        if (!$user || !in_array($user->role ?? null, $rolesArray)) {
            abort(403, 'Acesso não autorizado.');
        }

        return $next($request);
    }
}
