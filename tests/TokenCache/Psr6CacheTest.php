<?php

namespace GpsInsight\Api\Test\V2\TokenCache;

use Cache\Adapter\PHPArray\ArrayCachePool;
use GpsInsight\Api\V2\TokenCache\Psr6Cache;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\TokenCache\Psr6Cache
 */
class Psr6CacheTest extends TestCase
{
    public function testPsrCacheWorksWithPsrCompliantCachePool()
    {
        $data = [];
        $cache = new Psr6Cache(new ArrayCachePool(5, $data));

        $this->assertArrayNotHasKey('foo', $data);
        $cache->setToken('foo', 'bar');
        $this->assertArrayHasKey('foo', $data);
        $this->assertEquals('bar', $cache->getToken('foo'));
    }
}
