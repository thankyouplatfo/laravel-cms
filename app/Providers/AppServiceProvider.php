<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\CommentComposer;
use App\Http\ViewComposers\PageComposer;
use App\Http\ViewComposers\RoleComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use App\Models\User;

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
        view::composer(['lists.roles','admin.users.create'], RoleComposer::class);
        //
        view::composer('partials.sidebar', CommentComposer::class);
        //
        view::composer('partials.navbar', PageComposer::class);
        //
        Paginator::useBootstrap();
        //
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
    }
}
