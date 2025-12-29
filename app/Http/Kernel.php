<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /** The application's global HTTP middleware stack. */
    protected $middleware = [
    ];

    /** The application's route middleware groups. */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\LogRouteMiddlewareList::class,
        ],
        'api' => [],
    ];

    /** The application's middleware aliases. */
    protected $middlewareAliases = [
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];

    /**
     * Backwards-compatibility: older code may expect $routeMiddleware.
     */
    protected $routeMiddleware = [
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];

    public function terminate($request, $response)
    {
        \Illuminate\Support\Facades\Log::info('Kernel terminate', [
            'path' => $request->path() ?? null,
            'route_uri' => optional($request->route())->uri() ?? null,
            'route_middlewares' => optional($request->route()) ? $request->route()->gatherMiddleware() : [],
            'middlewareAliases' => $this->middlewareAliases ?? [],
            'middleware' => $this->middleware ?? [],
        ]);

        parent::terminate($request, $response);
    }
}
