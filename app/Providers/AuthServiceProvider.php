<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Define Admin user role
        Gate::define('isAdmin', function(User $user)
        {
            return auth()->user()->role =='admin';
        });

        /*Define Manager user role */
        Gate::define('isManager', function( User $user) 
        {
            return auth()->user()->role =='manager';
        });

        // Define a User role 
        Gate::define('isUser', function( User $user) 
        {
            return auth()->user()->role =='user';
        });

        // Gate::define('access_employees', function(User $user) 
        //     {
        //         return $user->is_admin;
        //     }
        // );

        // Gate::define('alter_features', function(User $user) 
        //     {
        //         return $user->is_admin;
        //     }
        // );
  }
}