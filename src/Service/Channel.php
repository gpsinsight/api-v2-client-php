<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Channels.
 */
class Channel extends ServiceClient
{
    const SERVICE = 'channel';

    /**
     * Get the current approved version of your app (by name).
     *
     * Valid parameters:
     *
     * - channel: The API channel you are using for your application
     *
     * @param array $params Parameters for channel/currentversion API.
     * @return Result The result of the channel/currentversion API.
     */
    public function currentVersion(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'currentversion', $params);
    }

    /**
     * Set a single version of your app as the approved (by name).
     *
     * Valid parameters:
     *
     * - channel: The API channel you are using for your application
     * - current_version: The version you would like to set
     *
     * @param array $params Parameters for channel/setcurrentversion API.
     * @return Result The result of the channel/setcurrentversion API.
     */
    public function setCurrentVersion(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setcurrentversion', $params);
    }

    /**
     * Show usage of a particular API channel by version and date.
     *
     * Valid parameters:
     *
     * - channel: The API channel you are using for your application
     * - date: The date you want to look at
     *
     * @param array $params Parameters for channel/usage API.
     * @return Result The result of the channel/usage API.
     */
    public function usage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'usage', $params);
    }
}
