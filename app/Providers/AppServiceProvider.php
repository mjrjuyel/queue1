<?php

namespace App\Providers;

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
         // Set the desired timezone dynamically
         $specificTimezone = 'Asia/Kolkata'; // Replace this with your desired timezone
         date_default_timezone_set($specificTimezone);
 
         // Optionally update the config for consistency
         config(['app.timezone' => $specificTimezone]);
    }
}
