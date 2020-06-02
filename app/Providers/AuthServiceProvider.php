<?php

namespace App\Providers;
use App\Role;
use App\User;
//MODEL//
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();


        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        Gate::define('permissions55_access', function ($user) { 
             return in_array($user->role_id, []);
        });
        Gate::define('modules55_access', function ($user) { 
             return in_array($user->role_id, []);
        });
        Gate::define('modules55_access', function ($user) { 
             return in_array($user->role_id, []);
        });
        Gate::define('roles55_access', function ($user) { 
             return in_array($user->role_id, []);
        });
        Gate::define('roles55_access', function ($user) { 
             return in_array($user->role_id, []);
        });
        Gate::define('users55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('users55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('users55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('users55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('users55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('division55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('division55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('division55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('division55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('division55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('status55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('status55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('status55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('status55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('status55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('strategicobjectives55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('strategicobjectives55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('strategicobjectives55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('strategicobjectives55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('strategicobjectives55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('successindicators55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('successindicators55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('successindicators55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('successindicators55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('successindicators55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('divisionindicators55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('divisionindicators55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('divisionindicators55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('divisionindicators55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('divisionindicators55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('ipcr55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('ipcr55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('ipcr55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('ipcr55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('ipcr55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('targets55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('targets55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('targets55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('targets55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('targets55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasks55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasks55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasks55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasks55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasks55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasksusers55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasksusers55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasksusers55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasksusers55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('tasksusers55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('files55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('files55_create', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('files55_view', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('files55_edit', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('files55_delete', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        Gate::define('settings255_access', function ($user) { 
             return in_array($user->role_id, [1,2]);
        });
        Gate::define('dashboard55_access', function ($user) { 
             return in_array($user->role_id, [1,2,3]);
        });
        //APPEND//

    }
}
