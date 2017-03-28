<?php

namespace GpsInsight\Api\V2\TokenCache;

class NullCache implements TokenCacheInterface
{
    public function getToken($key)
    {
        return null;
    }

    public function setToken($key, $token)
    {
        // Do nothing.
    }
}
