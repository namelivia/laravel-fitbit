<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Laravel;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;
use Namelivia\Fitbit\Api\Api;

/**
 * This is the Fitbit manager class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class FitbitManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \Namelivia\Fitbit\Laravel\FitbitFactory
     */
    private $factory;

    /**
     * Create a new Fitbit manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Namelivia\Fitbit\Laravel\FitbitFactory $factory
     *
     * @return void
     */
    public function __construct(Repository $config, FitbitFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return Namelivia\Fitbit\Api\Api
     */
    protected function createConnection(array $config): Api
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName(): string
    {
        return 'fitbit';
    }

    /**
     * Get the factory instance.
     *
     * @return  \Namelivia\Fitbit\Laravel\FitbitFactory
     */
    public function getFactory(): FitbitFactory
    {
        return $this->factory;
    }
}
