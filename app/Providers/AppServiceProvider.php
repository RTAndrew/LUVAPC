<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;
use View;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

    // VIEW COMPOSER
        View::composer('*', function($view){

            if (Auth::check()) {
                $user_id = Auth::user()->id;
                $user = User::find(Auth::user()->id);
                $view
                ->with('user', $user);
            }

        });









    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
