<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Usage in routes: ->middleware('role:administrador') or 'role:administrador|publicador'
     */
    public function handle(Request $request, Closure $next, ?string $roles = null): Response
    {
        $user = Auth::user();

        Log::info('RoleMiddleware check', ['id' => $user->id ?? null, 'role' => $user->role ?? null, 'required_roles' => $roles]);

        if (! $user) {
            return redirect()->route('admin.login')->with('error', 'É necessário fazer login para acessar a área administrativa.');
        }

        if ($roles) {
            $accepted = explode('|', $roles);
            if (! in_array($user->role, $accepted, true)) {
                Log::warning('RoleMiddleware denied', ['id' => $user->id ?? null, 'role' => $user->role ?? null, 'accepted' => $accepted]);

                $isAjax = $request->expectsJson() || strtolower($request->header('X-Requested-With') ?? '') === 'xmlhttprequest';
                if ($isAjax) {
                    return response()->json(['message' => 'Acesso negado: papel insuficiente.'], 403);
                }

                return redirect()->route('admin.forbidden')->with('error', 'Acesso negado: papel insuficiente.');
            }
        }

        return $next($request);
    }
}
