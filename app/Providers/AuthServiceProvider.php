<?php
// app/Providers/AuthServiceProvider.php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Model;
use App\Policies\AdminPolicy;
use App\Policies\SupportPolicy;
use App\Policies\AuthorPolicy;



class AuthServiceProvider extends ServiceProvider {
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Model::class => AdminPolicy::class,
        Model::class => SupportPolicy::class,
        Model::class => AuthorPolicy::class,
    ];

    public function boot() {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('user', function ($user) {
            return $user->hasRole('User');
        });

        Gate::define('support', function ($user) {
            return $user->hasRole('Support');
        });

        Gate::define('author', function ($user) {
            return $user->hasRole('Author');
        });
    }
}

