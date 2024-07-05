<?php

namespace IrfanChowdhury\BkashTokenizedCheckout;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BkashServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bkash.php', 'bkash'
        );
    }

    public function boot(): void
    {
        Route::middleware('web')->group(function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bkash');

        self::publishFiles();
    }

    private function publishFiles()
    {
        $this->publishes([
            __DIR__.'/../config/bkash.php' => config_path('bkash.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/bkash'),
        ]);

        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/bkash'),
        ], 'public');

        $this->publishes([
            __DIR__.'/Http/Controllers/Duplicate/BkashPaymentController.php' => app_path('Http/Controllers/BkashPaymentController.php'),
        ]);
    }
}
