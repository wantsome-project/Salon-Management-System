<?php

namespace App\Providers;

use App\Product;
use App\User;
use App\UserRoles;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerGates();
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
                ? Response::deny('You must be an administrator.')
                : Response::allow();

        });

        Gate::define('isCustomer', function ($user) {
            /* @var User $user */
            return empty($user->customer_id)
                ? Response::deny('You must be an administrator.')
                : Response::allow();
        });

        Gate::define('adminAndEmployee', function ($user) {
            /* @var User $user */
            return ($user->is_admin || $user->employee_id)
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });


    }
}
