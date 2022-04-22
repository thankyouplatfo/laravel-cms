<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\RoleComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
        //
        view::composer(['partials.sidebar', 'lists.categories'], CategoryComposer::class);
        //
        view::composer('lists.roles', RoleComposer::class);
        //
        Paginator::useBootstrap();
    }
}
