<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests\Laravel\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Namelivia\Fitbit\Laravel\Facades\Fitbit;
use Namelivia\Fitbit\Laravel\FitbitManager;
use Namelivia\Fitbit\Tests\Laravel\AbstractTestCase;

/**
 * This is the Fitbit test class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class FitbitTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'fitbit';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Fitbit::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return FitbitManager::class;
    }
}
