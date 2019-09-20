<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests\Laravel;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Namelivia\Fitbit\Laravel\FitbitServiceProvider;

/**
 * This is the abstract test class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return FitbitServiceProvider::class;
    }
}
