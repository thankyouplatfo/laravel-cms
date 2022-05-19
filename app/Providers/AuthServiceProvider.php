<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /**
         * The first way to give validity
         */
        //
        //Gate::define('delete-post', function ($user) {
        //    return $user->hasAllow('delete-post');
        //});
        ////
        //Gate::define('edit-post',function($user){
        //    return $user->hasAllow('edit-post');
        //});
        Permission::get(['title'])->map(function ($permission) {
            Gate::define($permission->title, function ($user) use ($permission) {
                return $user->hasAllow($permission->title);
            });
        });
    }
}
