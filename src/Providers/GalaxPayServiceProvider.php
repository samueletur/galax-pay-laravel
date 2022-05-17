<?php

namespace Samueletur\GalaxPay\Providers;

use Illuminate\Support\ServiceProvider;

class GalaxPayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            \Samueletur\GalaxPay\Commands\Publish::class
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/galax_pay.php', 'galax_pay');

        $this->app->bind('galaxPay', function () {
            return new \Samueletur\GalaxPay\GalaxPay();
        });
    }
}
