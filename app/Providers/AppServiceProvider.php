<?php

namespace App\Providers;

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
        $this->app->bind('App\Repositories\Users\UsersRepositoryInterface', 'App\Repositories\Users\UsersRepository');
        $this->app->bind('App\Repositories\Transactions\TransactionsRepositoryInterface', 'App\Repositories\Transactions\TransactionsRepository');
        $this->app->bind('App\Repositories\Notifications\NotificationsRepositoryInterface', 'App\Repositories\Notifications\NotificationsRepository');
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
