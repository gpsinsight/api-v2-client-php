<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Services;
use ReflectionClass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Services
 */
class ServicesTest extends TestCase
{
    public function testGetServiceNames()
    {
        $services = array_keys(Services::all());
        $constants = (new ReflectionClass(Services::class))->getConstants();

        $this->assertEmpty(array_diff($constants, $services));
    }
}
