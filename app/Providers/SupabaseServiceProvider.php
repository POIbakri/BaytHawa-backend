<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SupabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('supabase', function () {
            return new \Supabase\Service\SupabaseClient(
                env('SUPABASE_URL'),
                env('SUPABASE_KEY')
            );
        });
    }

    public function boot()
    {
        // Additional bootstrapping
    }
}
