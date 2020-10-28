<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackEndProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\Interfaces\AccountRepositoryInterface', 'App\Repository\Repositories\AccountRepository');
        $this->app->bind('App\Repository\Interfaces\TransactionRepositoryInterface', 'App\Repository\Repositories\TransactionRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
