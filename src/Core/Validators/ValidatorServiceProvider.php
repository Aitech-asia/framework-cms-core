<?php

namespace Core\Validators;

use Illuminate\Support\ServiceProvider;
use Validator;

class ValidatorServiceProvider extends ServiceProvider
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
        Validator::extend(
               'recaptcha',
               'Core\\Validators\\ReCaptcha@validate'
        );
    }
}
