<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::get()->map(function($permissions){
            Gate::define($permissions->nama, function($user) use ($permissions){
                return $user->hasPermissionsTo($permissions);
            });
        });

        Blade::if('role', function($role){
            return auth()->user()->hasRole($role);
        });
    }
}
