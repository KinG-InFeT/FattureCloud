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
        $configPath = __DIR__ . '/../../config/barcode.php';
        $this->publishes([$configPath => config_path('fatture-cloud.php')], 'config');

        $this->app->bind('FattureCloud', function ($app)
        {
            return new FattureCloud($app['config']);
        });
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $configPath = __DIR__ . '/../../config/barcode.php';
        $this->mergeConfigFrom($configPath, 'config');
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