<?php

namespace Core\Repository\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider.
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../../resources/config/repository.php' => config_path('repository.php'),
        ]);

        $this->mergeConfigFrom(__DIR__.'/../../../resources/config/repository.php', 'repository');

        $this->loadTranslationsFrom(__DIR__.'/../../../resources/lang', 'repository');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands('Core\Repository\Generators\Commands\RepositoryCommand');
        $this->commands('Core\Repository\Generators\Commands\TransformerCommand');
        $this->commands('Core\Repository\Generators\Commands\PresenterCommand');
        $this->commands('Core\Repository\Generators\Commands\EntityCommand');
        $this->commands('Core\Repository\Generators\Commands\ValidatorCommand');
        $this->commands('Core\Repository\Generators\Commands\ControllerCommand');
        $this->commands('Core\Repository\Generators\Commands\BindingsCommand');
        $this->commands('Core\Repository\Generators\Commands\CriteriaCommand');
        $this->app->register('Core\Repository\Providers\EventServiceProvider');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
