<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Laravel;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Namelivia\Fitbit\Api\Api;

/**
 * This is the Fitbit service provider class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class FitbitServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/fitbit.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('fitbit.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('fitbit');
        }

        $this->mergeConfigFrom($source, 'fitbit');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('fitbit.factory', function () {
            return new FitbitFactory();
        });

        $this->app->alias('fitbit.factory', FitbitFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('fitbit', function (Container $app) {
            $config = $app['config'];
            $factory = $app['fitbit.factory'];

            return new FitbitManager($config, $factory);
        });

        $this->app->alias('fitbit', FitbitManager::class);
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        $this->app->bind('fitbit.connection', function (Container $app) {
            $manager = $app['fitbit'];

            return $manager->connection();
        });

        $this->app->alias('fitbit.connection', Api::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array
    {
        return [
            'fitbit',
            'fitbit.factory',
            'fitbit.connection',
        ];
    }
}
