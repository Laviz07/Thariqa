<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        // if (app()->environment('local')) {
        //     URL::forceScheme('https');
        // }

        // if (app()->environment('production')) {
        //     URL::forceScheme('https');
        // }

        if (app()->isProduction()) {
            URL::forceScheme('https');
            request()->server->set(
                'HTTPS',
                request()->header('X-Forwarded-Proto', 'https') == 'https' ? 'on' : 'off'
            );
        }

        $publicStorage = public_path('storage');

        if (!is_link($publicStorage)) {
            if (file_exists($publicStorage)) {
                unlink($publicStorage);
            }

            // symlink(storage_path('app/public'), $publicStorage);
            symlink('/storage', $publicStorage);
        }
    }
}
