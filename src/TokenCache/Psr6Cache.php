<?php

namespace GpsInsight\Api\V2\TokenCache;

use Psr\Cache\CacheItemPoolInterface;

class Psr6Cache implements TokenCacheInterface
{
    /** @var CacheItemPoolInterface */
    private $cache;

    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    public function getToken($key)
    {
        $item = $this->cache->getItem($key);

        return $item->isHit() ? $item->get() : null;
    }

    public function setToken($key, $token)
    {
        $item = $this->cache->getItem($key);

        $item->set($token);
        $item->expiresAfter(60 * 60 * 24 * 30);

        $this->cache->save($item);
    }
}
