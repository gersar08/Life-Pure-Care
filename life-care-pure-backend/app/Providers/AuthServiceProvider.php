<?php

namespace App\Providers;

use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Sanctum\Sanctum; // Add this import

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        
        // Registro de tokens con expiracion
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        //Registro de Roles

        Gate::define('manage-roles', [RolePolicy::class, 'manageRoles']);
        Gate::define('assign-role', [RolePolicy::class, 'assignRole']);
        Gate::define('remove-role', [RolePolicy::class, 'removeRole']);
        Gate::define('modify-inventory', [RolePolicy::class, 'modifyInventory']);
        Gate::define('modify-price', [RolePolicy::class, 'modifyPrice']);
        Gate::define('update-post', 'App\Policies\PostPolicy@update');
        Gate::define('delete-post', 'App\Policies\PostPolicy@delete');

        // Registra la política UserPolicy
        Gate::define('update-user', 'App\Policies\UserPolicy@update');
        Gate::define('delete-user', 'App\Policies\UserPolicy@delete');
    }
}
