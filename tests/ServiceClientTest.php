<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\Service\Alert as AlertService;
use GpsInsight\Api\V2\Client;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\ServiceClient
 */
class ServiceClientTest extends TestCase
{
    public function testServiceClientCanMakeApiCall()
    {
        $client = $this->createMock(Client::class);
        $client->expects($this->once())
            ->method('call')
            ->willReturn(new Result());

        $alertService = new AlertService($client);
        $result = $alertService->listAlerts();

        $this->assertInstanceOf(Result::class, $result);
    }
}
