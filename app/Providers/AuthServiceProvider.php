<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();


        // Define Passport token scopes
        Passport::tokensCan([
            'user' => 'Access as a user',
        ]);

        // Set a default scope if no scope is specified
        Passport::setDefaultScope([
            'user',
        ]);
    }
}
