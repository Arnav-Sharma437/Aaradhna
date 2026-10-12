<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        // Safely share store settings to all views without crashing during migrations
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('settings')) {
                    $settings = Setting::all()->pluck('value', 'key')->toArray();
                    $view->with('storeSettings', $settings);
                }
            } catch (\Throwable $e) {
                // Graceful fallback if database is not reachable
                $view->with('storeSettings', []);
            }
        });
    }
}
