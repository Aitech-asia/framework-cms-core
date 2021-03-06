<?php

namespace Core\Master;

use Illuminate\Support\ServiceProvider;

class MasterServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'master');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'master');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

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
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'master');

        // Bind facade
        $this->app->bind('Core.master', function ($app) {
            return $this->app->make('Core\Master\Master');
        });

                // Bind Master to repository
        $this->app->bind(
            'Core\Master\Interfaces\MasterRepositoryInterface',
            \Core\Master\Repositories\Eloquent\MasterRepository::class
        );

        $this->app->register(\Core\Master\Providers\AuthServiceProvider::class);
        
        $this->app->register(\Core\Master\Providers\RouteServiceProvider::class);
                
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Core.master'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/config/config.php' => config_path('master.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/resources/views' => base_path('resources/views/vendor/master')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/resources/lang' => base_path('resources/lang/vendor/master')], 'lang');

        // Publish public files and assets.
        $this->publishes([__DIR__ . '/public/' => public_path('/')], 'public');
    }
}
