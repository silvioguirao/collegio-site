<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind 'role' to RoleMiddleware to ensure container can resolve it in termination phase
        $this->app->bind('role', function ($app) {
            return $app->make(\App\Http\Middleware\RoleMiddleware::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Ensure SEO helper functions are loaded in all environments
        if (! function_exists('seo_organization')) {
            require_once app_path('Helpers/seo.php');
        }
    }
}
