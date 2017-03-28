<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\GpsInsight;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class EndToEndTest extends TestCase
{
    public function testDriverEndToEndWorkflow()
    {
        // Create the client.
        $gpsInsight = new GpsInsight([
            'username' => 'user',
            'password' => 'pass',
            'http_handler' => new MockHandler([
                new Response(200, [], $this->getCannedLoginResponse()),
                new Response(200, [], $this->getCannedCreateDriverResponse()),
                new Response(200, [], $this->getCannedListDriversResponse()),
                new Response(200, [], $this->getCannedDeleteDriverResponse()),
            ]),
        ]);

        // Create a driver.
        $refId = 'test-foo-bar';
        $result = $gpsInsight->driver->create([
            'lastname' => 'Bar',
            'firstname' => 'Foo',
            'ref_id' => $refId,
            'alert_pref' => 0,
            'timezone' => 'US/Arizona',
        ]);
        $this->assertTrue($result->isOk());
        $this->assertEquals('Driver added', $result['message']);
        $driverId = $result['id'];

        // Make sure the driver appears in the driver list.
        $result = $gpsInsight->driver->listDrivers(['driver' => $driverId]);
        $this->assertTrue($result->isOk());
        $this->assertEquals($driverId, $result[0]['id']);
        $this->assertEquals($refId, $result[0]['ref_id']);

        // Delete the driver.
        $result = $gpsInsight->driver->delete(['driver' => $driverId]);
        $this->assertTrue($result->isOk());
        $this->assertEquals('Driver deleted', $result['message']);
    }

    private function getCannedLoginResponse()
    {
        return <<<JSON
{
  "head": {
    "status": "OK"
  },
  "data": {
    "token": "abc"
  }
}
JSON;
    }

    private function getCannedCreateDriverResponse()
    {
        return <<<JSON
{
  "head": {
    "status": "OK"
  },
  "data": {
    "message": "Driver added",
    "id": 1234567
  }
}
JSON;
    }

    private function getCannedListDriversResponse()
    {
        return <<<JSON
{
  "head": {
    "status": "OK"
  },
  "data": [
    {
      "id": 1234567,
      "firstname": "Foo",
      "lastname": "Bar",
      "ref_id": "test-foo-bar"
    }
  ]
}
JSON;
    }

    private function getCannedDeleteDriverResponse()
    {
        return <<<JSON
{
  "head": {
    "status": "OK"
  },
  "data": {
    "message": "Driver deleted"
  }
}
JSON;
    }
}
