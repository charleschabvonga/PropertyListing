<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['realtor']);
        });

        Gate::define('edit-users', function($user){
            return $user->hasRole('realtor');
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('realtor');
        });

        Gate::define('access-property-listing', function($user){
            return $user->hasAnyRoles(['realtor','buyer']);
        });

        Gate::define('view-property-bids', function($user){
            return $user->hasRole('realtor');
        });

        Gate::define('create-property', function($user){
            return $user->hasRole('realtor');
        });

        Gate::define('view-property-details', function($user){
            return $user->hasRole('buyer');
        });

        Gate::define('accept-property-bid', function($user){
            return $user->hasRole('realtor');
        });

        Gate::define('back-to-properties', function($user){
            return $user->hasRole('buyer');
        });

        Gate::define('back-to-dashboard', function($user){
            return $user->hasRole('realtor');
        });
    }
}
