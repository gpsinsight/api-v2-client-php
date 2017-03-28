<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Factory;
use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\GpsInsight;
use GpsInsight\Api\V2\Config;
use GpsInsight\Api\V2\Client;
use GpsInsight\Api\V2\Service\Driver;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\GpsInsight
 */
class GpsInsightTest extends TestCase
{
    public function testCanGetConfigAndClientFromSdk()
    {
        $gpsInsight = new GpsInsight();
        $this->assertInstanceOf(Config::class, $gpsInsight->getConfig());
        $this->assertInstanceOf(Client::class, $gpsInsight->getClient());
    }

    public function testCanCallArbitraryApis()
    {
        $gpsInsight = new GpsInsight([
            'factory' => $this->createMockFactory()
        ]);
        $result = $gpsInsight->call('foo', 'bar');

        $this->assertInstanceOf(Result::class, $result);
    }

    public function testCanGetAServiceClientViaMagicGet()
    {
        $gpsInsight = new GpsInsight([
            'factory' => $this->createMockFactory()
        ]);

        $driverService = $gpsInsight->driver;
        $this->assertInstanceOf(Driver::class, $driverService);
        $this->assertSame($driverService, $gpsInsight->driver);

        $result = $gpsInsight->driver->listDrivers();
        $this->assertInstanceOf(Result::class, $result);
    }

    /**
     * @return Factory
     */
    private function createMockFactory()
    {
        $client = $this->createMock(Client::class);
        $client->method('call')->willReturn(new Result());

        $factory = $this->getMockBuilder(Factory::class)
            ->disableOriginalConstructor()
            ->setMethodsExcept(['createServiceClient'])
            ->getMock();
        $factory->method('createClient')->willReturn($client);

        return $factory;
    }
}
