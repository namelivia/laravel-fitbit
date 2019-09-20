<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests\Laravel;

use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Illuminate\Contracts\Config\Repository;
use Mockery;
use Namelivia\Fitbit\Api\Api;
use Namelivia\Fitbit\Laravel\FitbitFactory;
use Namelivia\Fitbit\Laravel\FitbitManager;

/**
 * This is the Fitbit manager test class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class FitbitManagerTest extends AbstractTestBenchTestCase
{
    public function testCreateConnection()
    {
        $config = ['path' => __DIR__];

        $manager = $this->getManager($config);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('fitbit.default')->andReturn('fitbit');

        $this->assertSame([], $manager->getConnections());

        $return = $manager->connection();

        $this->assertInstanceOf(Api::class, $return);

        $this->assertArrayHasKey('fitbit', $manager->getConnections());
    }

    protected function getManager(array $config)
    {
        $repository = Mockery::mock(Repository::class);
        $factory = Mockery::mock(FitbitFactory::class);

        $manager = new FitbitManager($repository, $factory);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('fitbit.connections')->andReturn(['fitbit' => $config]);

        $config['name'] = 'fitbit';

        $manager->getFactory()->shouldReceive('make')->once()
            ->with($config)->andReturn(Mockery::mock(Api::class));

        return $manager;
    }
}
