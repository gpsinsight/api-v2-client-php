<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Heartbeats.
 */
class Heartbeat extends ServiceClient
{
    const SERVICE = 'heartbeat';

    /**
     * Simplest heartbeat response.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for heartbeat/beat API.
     * @return Result The result of the heartbeat/beat API.
     */
    public function beat(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'beat', $params);
    }

    /**
     * Repeats back a given word. Use for parameter/response testing @request word will be repeated in response.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for heartbeat/repeat API.
     * @return Result The result of the heartbeat/repeat API.
     */
    public function repeat(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'repeat', $params);
    }
}
