<?php

namespace Core\Block;

use Illuminate\Support\ServiceProvider;

class BlockServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'block');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'block');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Call pblish redources function
        $this->publishResources();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'Core.block');
        
        // Bind facade
        $this->app->bind('block', function ($app) {
            return $this->app->make('Core\Block\Block');
        });

        // Bind Category to repository
        $this->app->bind(
            'Core\Block\Interfaces\CategoryRepositoryInterface',
            \Core\Block\Repositories\Eloquent\CategoryRepository::class
        );

        // Bind Block to repository
        $this->app->bind(
            'Core\Block\Interfaces\BlockRepositoryInterface',
            \Core\Block\Repositories\Eloquent\BlockRepository::class
        );

        $this->app->register(\Core\Block\Providers\AuthServiceProvider::class);
        $this->app->register(\Core\Block\Providers\EventServiceProvider::class);
        $this->app->register(\Core\Block\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['block'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('Core/block.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../resources/views' => base_path('resources/views/vendor/block')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../resources/lang' => base_path('resources/lang/vendor/block')], 'lang');

        // Publish public
        $this->publishes([__DIR__ . '/../public/' => public_path('/')], 'public');
    }
}
