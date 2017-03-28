<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Config;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Config
 */
class ConfigTest extends TestCase
{
    public function testCanCreateConfig()
    {
        $config = new Config();
        $this->assertContains('gpsinsight', $config['endpoint']);
    }
}
