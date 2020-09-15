<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;//make
use Auth;//make

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
        //form by me
        Schema::defaultStringLength(192);
        View::share('Name',"sarthak sinha");
       
        View::composer('*',function($view){
            $view->with('userData',Auth::user());
        });

        /*
         by above code we print user detain  in any page of our application
        */
    }
}
