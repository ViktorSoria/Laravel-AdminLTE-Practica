<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('Crear_Usuario', function ($user) {
            return $user->hasRole('Administrador');
        });

        Gate::define('Editar_Usuario', function ($user) {
            return $user->hasRole('Administrador');
        });

        Gate::define('Eliminar_Usuario', function ($user) {
            return $user->hasRole('Administrador');
        });
    }
}
