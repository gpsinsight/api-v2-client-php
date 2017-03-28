<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\GpsInsight;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class SmokeTest extends TestCase
{
    public function testDriverEndToEndWorkflow()
    {
        // Get credentials.
        $configPath = __DIR__ . '/../config.php';
        $this->assertFileIsReadable($configPath, 'Cannot read config.php file');
        $config = include $configPath;
        $this->assertArrayHasKey('credentials', $config, 'Credentials not declared in config.php');

        // Create the client.
        $gpsInsight = new GpsInsight($config['credentials'] + [
            'channel' => 'php-client-test',
            'version' => GpsInsight::VERSION,
            'wire_log' => true,
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
        $this->assertRegExp('/Driver (added|undeleted)/', $result['message']);
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
}
