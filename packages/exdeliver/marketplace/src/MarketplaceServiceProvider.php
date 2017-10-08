<?php

namespace Exdeliver\Marketplace;

use Illuminate\Support\ServiceProvider;

class MarketplaceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $this->loadTranslationsFrom(__DIR__.'/Translations', 'marketplace');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Exdeliver\Marketplace\Controllers\MarketplaceController');

        $this->app->bind('marketplaceservice', 'Exdeliver\Marketplace\Services\MarketplaceService'); // bind service

        $this->loadViewsFrom(__DIR__.'/Views', 'marketplace');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');

    }
}