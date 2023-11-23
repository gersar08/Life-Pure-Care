<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\PrecioEspecial;
use App\Models\User;
use App\Models\Clientes;
use App\Policies\PrecioEspecialPolicy;
use App\Policies\UserPolicy;
use App\Policies\ClientesPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        PrecioEspecial::class => PrecioEspecialPolicy::class,
        User::class => UserPolicy::class,
        Clientes::class => ClientesPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
