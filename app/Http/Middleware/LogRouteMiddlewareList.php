<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRouteMiddlewareList
{
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();
        $middlewares = [];

        if ($route) {
            try {
                $middlewares = $route->gatherMiddleware();
            } catch (\Throwable $e) {
                Log::warning('Error gathering middleware list', ['exception' => $e->getMessage()]);
            }
        }

        Log::info('Route middleware list', ['uri' => $request->path(), 'middleware' => $middlewares]);

        return $next($request);
    }
}
