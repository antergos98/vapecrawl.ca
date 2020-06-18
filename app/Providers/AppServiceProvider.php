<?php

namespace App\Providers;

use App\Support\PriceFormatter;
use App\Support\ProductNormalizer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductNormalizer::class, fn() => new ProductNormalizer(new PriceFormatter));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
