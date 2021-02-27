<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\DivisiPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('akses', function ($user) {
            // dd($user->name);
            $roles = User::find($user->id)->role;
            // dd($roles);
            foreach ($roles as $role) {
                if ($role->id == 1) {
                    return true;
                } else {
                    return null;
                }
            }
        });
        Gate::define('crud_divisi', function ($user) {
            // return null;
            // $roles = User::find($user->id)->role;
            // foreach ($roles as $role) {
            //     if ($role->id == 1) {
            //         return true;
            //     } else {
            //         return null;
            //     }
            // }
            if ($user->username != 'admin') {
                return false;
            } else {
                return true;
            }
        });
    }
}
