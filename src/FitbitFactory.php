<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Laravel;

use Illuminate\Support\Arr;
use InvalidArgumentException;
use kamermans\OAuth2\Persistence\NullTokenPersistence;
use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\ServiceProvider;

/**
 * This is the Fitbit factory class.
 *
 * @author José Ignacio Amelivia Santiago <ohcan2@gmail.com>
 */
class FitbitFactory
{
    /**
     * Make a new Fitbit client.
     *
     * @param array $config
     *
     * @return \Namelivia\Fitbit\Api\Fitbit
     */
    public function make(array $config): Fitbit
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function getConfig(array $config): array
    {
        $keys = [
            'client_id',
            'client_secret',
            'redirect_url',
        ];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return Arr::only($config, $keys);
    }

    /**
     * Get the fitbit client.
     *
     * @param string[] $auth
     *
     * @return \Namelivia\Fitbit\Api\Fitbit
     */
    protected function getClient(array $auth): Fitbit
    {
        $tokenPersistence = new NullTokenPersistence();

        return (new ServiceProvider())->build(
            $tokenPersistence,
            $auth['client_id'],
            $auth['client_secret'],
            $auth['redirect_url']
        );
    }
}
