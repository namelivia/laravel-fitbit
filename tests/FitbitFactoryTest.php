<?php

declare(strict_types=1);

namespace Namelivia\Fitbit\Tests\Laravel;

use Namelivia\Fitbit\Api\Fitbit;
use Namelivia\Fitbit\Laravel\FitbitFactory;

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
        ]);

        $this->assertInstanceOf(Fitbit::class, $return);
    }

    public function testMakeWithoutClientId()
    {
        $factory = $this->getFitbitFactory();

        $this->expectException(\InvalidArgumentException::class);
        $factory->make([
            'client_secret' => 'your-client-secret',
            'redirect_url' => 'your-redirect-url',
        ]);
    }

    public function testMakeWithoutClientSecret()
    {
        $factory = $this->getFitbitFactory();

        $this->expectException(\InvalidArgumentException::class);
        $return = $factory->make([
            'client_id' => 'your-client-id',
            'redirect_url' => 'your-redirect-url',
        ]);
    }

    public function testMakeWithoutRedirectUrl()
    {
        $factory = $this->getFitbitFactory();

        $this->expectException(\InvalidArgumentException::class);
        $return = $factory->make([
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
        ]);
    }

    protected function getFitbitFactory()
    {
        return new FitbitFactory();
    }
}
