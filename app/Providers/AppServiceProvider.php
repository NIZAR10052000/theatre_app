<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        //
    }

   
    public function boot(): void
    {
        // Force HTTPS scheme in production or when APP_URL uses https
        try {
            if (app()->environment('production') || str_starts_with(config('app.url', ''), 'https')) {
                URL::forceScheme('https');
            }
        } catch (\Throwable $e) {
            // avoid breaking local environments where helpers/config may not be fully available
        }
    }
}
