<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Page;
use App\Policies\PagePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Page::class => PagePolicy::class,
        \App\Models\Event::class => \App\Policies\EventPolicy::class,
        \App\Models\MaterialDidatico::class => \App\Policies\MaterialDidaticoPolicy::class,
        \App\Models\Boletim::class => \App\Policies\BoletimPolicy::class,
        \App\Models\Turma::class => \App\Policies\TurmaPolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
