<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;
use Log;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\User\UserDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\User\UserService');
        
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
    }
}