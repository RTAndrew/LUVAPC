<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('isCandidato', function ($user) {
            return $user->perfil == 'candidato';
        });

        Gate::define('isAdmin', function ($user) {
            return $user->perfil == 'admin';
        });

        Gate::define('isFuncionario', function ($user) {
            return $user->perfil == 'funcionario';
        });
    }
}
