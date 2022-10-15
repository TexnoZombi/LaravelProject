<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        Gate::define('ads-user', 
            function($user, $id) {
                $id_user_autors = DB::table('ads')->where('id', $id)->value('id_user_autors');
                $id = $user->id;
                return $id_user_autors == $id;
            }
        );

        Gate::define('ads-admin', 
            function($user) {
                $id = $user->id;
                $role = DB::table('roles')->where('id_user_role', '=', $id)->value('role');
                if($role == 'admin') {
                    return true;
                }
                else {
                    return false;
                }
            }   
        );
    }
}
