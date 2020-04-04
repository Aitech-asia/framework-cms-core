<?php

namespace Core\Page;

use Illuminate\Support\ServiceProvider;
use Core\Page\Models\Page;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'page');

        // Load translation
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'page');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishResources();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'Core.page');

        $this->app->bind('page', function ($app) {
            return $this->app->make('Core\Page\Page');
        });

        $this->app->bind(
            'Core\Page\Interfaces\PageRepositoryInterface',
            \Core\Page\Repositories\Eloquent\PageRepository::class
        );

        $this->app->register(\Core\Page\Providers\AuthServiceProvider::class);
        $this->app->register(\Core\Page\Providers\EventServiceProvider::class);
        $this->app->register(\Core\Page\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['page'];
    }

    /**
     * Publish configuration file.
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__.'/../config/config.php' => config_path('Core/page.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__.'/../resources/views' => base_path('resources/views/vendor/page')], 'view');

        // Publish language files
        $this->publishes([__DIR__.'/../resources/lang' => base_path('resources/lang/vendor/page')], 'lang');

        // Publish language files
        $this->publishes([__DIR__.'/../public' => base_path('public')], 'public');
    }

}
