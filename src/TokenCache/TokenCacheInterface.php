<?php

namespace GpsInsight\Api\V2\TokenCache;

interface TokenCacheInterface
{
    /**
     * @param string $key
     * @return string|null
     */
    public function getToken($key);

    /**
     * @param string $key
     * @param string $token
     * @return void
     */
    public function setToken($key, $token);
}
