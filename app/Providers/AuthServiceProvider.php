<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if(! $this->app->runningInConsole())
        {
            $permissions = Permission::all();

            // foreach ($permissions as $permission) {
            //     Gate::define($permission->name, function($user) use ($permission) {
            //         return $user->hasPermission($permission->name);
            //     });
            // }
            
            Gate::define('can-permission', function($user, ...$params) {
                foreach ($params as $param) {
                    return $user->hasPermission($param);
                }
            });
        }
    }
}
