<?php

namespace IrfanChowdhury\BkashTokenizedCheckout;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BkashServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bkash.php', 'bkash'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middleware('web')->group(function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bkash');

    }
}
