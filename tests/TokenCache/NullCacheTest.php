<?php

namespace GpsInsight\Api\Test\V2\TokenCache;

use GpsInsight\Api\V2\TokenCache\NullCache;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\TokenCache\NullCache
 */
class NullCacheTest extends TestCase
{
    public function testNullCacheDoesNothing()
    {
        $cache = new NullCache();
        $cache->setToken('foo', 'bar');
        $this->assertNull($cache->getToken('foo'));
    }
}
