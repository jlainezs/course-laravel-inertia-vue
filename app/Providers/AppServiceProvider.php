<?php

namespace App\Providers;

use App\Policies\ListingPolicy;
use App\Policies\NotificationPolicy;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-listings', [ListingPolicy::class, 'viewAny']);
        Gate::define('view', [ListingPolicy::class, 'view']);
        Gate::define('create', [ListingPolicy::class, 'create']);
        Gate::define('update', [ListingPolicy::class, 'update']);
        Gate::define('delete', [ListingPolicy::class, 'delete']);
        Gate::define('restore', [ListingPolicy::class, 'restore']);
        Gate::define('forceDelete', [ListingPolicy::class, 'forceDelete']);

        Gate::define('update', [NotificationPolicy::class, 'update']);
    }
}
