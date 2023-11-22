<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\PrecioEspecial;
use App\Policies\PrecioEspecialPolicy;
class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        PrecioEspecial::class => PrecioEspecialPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
