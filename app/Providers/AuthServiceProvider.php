<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {
        $this->registerPolicies();

        //
        // Gate::define('is-admin', function ($user) {
        //     return ($user->role === 'staff' || $user->role === 'owner');
        // });

        // // Define a gate for the buyer role
        // Gate::define('is-buyer', function ($user) {
        //     return $user->role === 'buyer';
        // });

        Gate::define('is-staff-or-owner', [UserPolicy::class, 'isStaffOrOwner']);
        Gate::define('is-buyer', [UserPolicy::class, 'isBuyer']);
    }
}
