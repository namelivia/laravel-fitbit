<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Laravel;

use InvalidArgumentException;
use Namelivia\Fitbit\Api\Api;

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
     * @return \Namelivia\Fitbit\Api\Api
     */
    public function make(array $config): Api
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
            'token_path',
        ];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        return array_only($config, $keys);
    }

    /**
     * Get the fitbit client.
     *
     * @param string[] $auth
     *
     * @return \Namelivia\Fitbit\Api\Api
     */
    protected function getClient(array $auth): Api
    {
        return new Api(
            $auth['client_id'],
            $auth['client_secret'],
            $auth['redirect_url'],
            $auth['token_path']
        );
    }
}
