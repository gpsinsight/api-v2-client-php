<?php

namespace GpsInsight\Api\Test\V2\TokenCache;

use GpsInsight\Api\V2\TokenCache\CallbackCache;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\TokenCache\CallbackCache
 */
class CallbackCacheTest extends TestCase
{
    public function testCallbackCacheUsesProvidedCallbacks()
    {
        $data = [];
        $cache = new CallbackCache(
            function ($key) use (&$data) {
                return isset($data[$key]) ? $data[$key] : null;
            },
            function ($key, $token) use (&$data) {
                return $data[$key] = $token;
            }
        );

        $this->assertArrayNotHasKey('foo', $data);
        $cache->setToken('foo', 'bar');
        $this->assertArrayHasKey('foo', $data);
        $this->assertEquals('bar', $cache->getToken('foo'));
    }
}
