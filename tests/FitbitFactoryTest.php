<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests\Laravel;

use Namelivia\Fitbit\Laravel\FitbitFactory;
use Namelivia\Fitbit\Api\Api;

/**
 * This is the Fitbit factory test class.
 *
 * @author José Ignacio Amelivia Santiago <jignacio.amelivia@gmail.com>
 */
class FitbitFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getFitbitFactory();

        $return = $factory->make([
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
            'redirect_url' => 'your-redirect-url',
            'token_path' => 'your-token-path',
        ]);

        $this->assertInstanceOf(Api::class, $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutClientId()
    {
        $factory = $this->getFitbitFactory();

        $factory->make([
            'client_secret' => 'your-client-secret',
            'redirect_url' => 'your-redirect-url',
            'token_path' => 'your-token-path',
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutClientSecret()
    {
        $factory = $this->getFitbitFactory();

        $return = $factory->make([
            'client_id' => 'your-client-id',
            'redirect_url' => 'your-redirect-url',
            'token_path' => 'your-token-path',
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutRedirectUrl()
    {
        $factory = $this->getFitbitFactory();

        $return = $factory->make([
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
            'token_path' => 'your-token-path',
        ]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutTokenPath()
    {
        $factory = $this->getFitbitFactory();

        $return = $factory->make([
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
            'redirect_url' => 'your-redirect-url',
        ]);
    }

    protected function getFitbitFactory()
    {
        return new FitbitFactory();
    }
}
