<?php

namespace Kiboko\FattureCloud;

use Illuminate\Support\ServiceProvider;

class FattureCloudServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        /*
         * Assign the configuration as publishable, and tag it as 'config'
         */
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('fatture-cloud.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('FattureCloud', function ()
        {
            return new FattureCloud;
        });

        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php', 'fatture-cloud.php'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['FattureCloud'];
    }
}