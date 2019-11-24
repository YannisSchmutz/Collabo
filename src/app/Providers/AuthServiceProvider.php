<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-auth-user', function ($auth, $user) {
            return $user->id === $auth->id;
        });

        Gate::define('is-projectowner', function ($user, $project) {
            foreach($project->users as $projectuser){
                if($projectuser->pivot->permission === 'owner' && $projectuser->id === $user->id)
                    return true;
            }
            return false;
        });
    }
}
