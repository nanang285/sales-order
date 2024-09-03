<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Registrasi layanan dapat dilakukan di sini jika diperlukan
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Memaksa URL untuk menggunakan HTTPS jika berada di lingkungan produksi
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Set locale Carbon ke bahasa Indonesia
        Carbon::setLocale('id');
    }
}
