<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view){

            $siteCurrency = \AppHelper::instance()->getSiteCurrency();
            $itemsInCart = \CartHelper::instance()->countItemsInCart();
            $view->with('itemsInCart', $itemsInCart )->with('siteCurrency', $siteCurrency);

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
