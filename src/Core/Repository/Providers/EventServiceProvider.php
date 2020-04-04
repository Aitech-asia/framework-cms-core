<?php
namespace Core\Repository\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Core\Repository\Providers
 * @author Laravel <info@info@laravel.org>
 */
class EventServiceProvider extends ServiceProvider
{

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Core\Repository\Events\RepositoryEntityCreated' => [
            'Core\Repository\Listeners\CleanCacheRepository'
        ],
        'Core\Repository\Events\RepositoryEntityUpdated' => [
            'Core\Repository\Listeners\CleanCacheRepository'
        ],
        'Core\Repository\Events\RepositoryEntityDeleted' => [
            'Core\Repository\Listeners\CleanCacheRepository'
        ]
    ];

    /**
     * Register the application's event listeners.
     *
     * @return void
     */
    public function boot()
    {
        $events = app('events');

        foreach ($this->listen as $event => $listeners) {
            foreach ($listeners as $listener) {
                $events->listen($event, $listener);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }

    /**
     * Get the events and handlers.
     *
     * @return array
     */
    public function listens()
    {
        return $this->listen;
    }
}
