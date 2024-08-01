<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\SupabaseServiceProvider; // Ensure this is not declaring the class

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the SupabaseServiceProvider without redeclaring it
        $this->app->register(SupabaseServiceProvider::class);
    }

    public function boot()
    {
        // Any additional bootstrapping
    }
}
