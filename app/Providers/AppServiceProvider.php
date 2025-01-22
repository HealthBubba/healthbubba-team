<?php

namespace App\Providers;

use App\Enums\Settings;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if(!app()->runningInConsole()) {
            View::share([
                'settings' => Settings::class
            ]);
        }

        Paginator::useBootstrapFive();

        Gate::define('admin', function () {
            $user = Auth::user();
            return $user->is_admin;
        });

        Gate::define('marketer', function () {
            $user = Auth::user();
            return $user->is_marketer;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
