<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests\Laravel;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Namelivia\Fitbit\Laravel\FitbitFactory;
use Namelivia\Fitbit\Laravel\FitbitManager;
use Namelivia\Fitbit\ServiceProvider;

/**
 * This is the service provider test class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testFitbitFactoryIsInjectable()
    {
        $this->assertIsInjectable(FitbitFactory::class);
    }

    public function testFitbitManagerIsInjectable()
    {
        $this->assertIsInjectable(FitbitManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(ServiceProvider::class);

        $original = $this->app['fitbit.connection'];
        $this->app['fitbit']->reconnect();
        $new = $this->app['fitbit.connection'];

        $this->assertNotSame($original, $new);
        $this->assertEquals($original, $new);
    }
}
