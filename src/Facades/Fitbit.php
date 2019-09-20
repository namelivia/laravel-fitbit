<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Fitbit facade class.
 *
 * @author José Ignacio Amelivia Santiago <jiamelivia@gmail.com>
 */
class Fitbit extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'fitbit';
    }
}
