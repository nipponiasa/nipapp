<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

//authorization
use App\Models\User;
use Illuminate\Support\Facades\Gate;
//authorization


class AppServiceProvider extends ServiceProvider
{


    protected $policies = [

            

    ];


    /**
     * Register any application services.
     *
     * @return void
     */

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
        

        // Should return TRUE or FALSE

     

   

        /* define a admin user role */

        Gate::define('isAdmin', function($user) {

           return $user->role == 'admin';

        });

       

        /* define a manager user role */

        Gate::define('isManager', function($user) {

            return $user->role == 'manager';

        });

      

        /* define a user role */

        Gate::define('isUser', function($user) {

            return $user->role == 'user';

        });



        /* define a user role */

        Gate::define('iscapetown_user', function($user) {

            return $user->role == 'capetown_user';

        });





        //
    }
}
