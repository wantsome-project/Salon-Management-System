<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerGates();

        //
    }
    public function registerGates()
    {
        Gate::define('isAdmin', function ($user) {
            /* @var User $user */
            return $user->is_admin == true
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        Gate::define('isEmployee', function ($user) {
            /* @var User $user */
            return empty($user->employee_id)
                ? Response::deny('You must be an employee.')
                : Response::allow();

        });

        Gate::define('isCustomer', function ($user) {
            /* @var User $user */
            return empty($user->customer_id)
                ? Response::deny('You must be a customer.')
                : Response::allow();
        });

        Gate::define('adminAndEmployee', function ($user) {
            /* @var User $user */
            return ($user->is_admin || $user->employee_id)
                ? Response::allow()
                : Response::deny('You must be an administrator or employee.');
        });


    }
}
