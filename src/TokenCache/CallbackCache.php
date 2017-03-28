<?php

namespace GpsInsight\Api\V2\TokenCache;

class CallbackCache implements TokenCacheInterface
{
    /** @var callable */
    private $getCallback;

    /** @var callable */
    private $setCallback;

    public function __construct(callable $getCallback, callable $setCallback)
    {
        $this->getCallback = $getCallback;
        $this->setCallback = $setCallback;
    }

    public function getToken($key)
    {
        return call_user_func($this->getCallback, $key);
    }

    public function setToken($key, $token)
    {
        return call_user_func($this->setCallback, $key, $token);
    }
}
