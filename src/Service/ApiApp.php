<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to ApiApps.
 */
class ApiApp extends ServiceClient
{
    const SERVICE = 'apiapp';

    /**
     * Create a new App for API access.
     *
     * Valid parameters:
     *
     * - app_name: Identifier for the app token
     * - description: Description of the app token
     * - username: (optional) Username to whom the app token will be assigned
     *
     * @param array $params Parameters for apiapp/create API.
     * @return Result The result of the apiapp/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * List all available apps for this user.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for apiapp/list API.
     * @return Result The result of the apiapp/list API.
     */
    public function listApiApps(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Update an App token.
     *
     * Valid parameters:
     *
     * - app_token
     * - new_app_token: (optional)
     * - active
     * - app_name: (optional)
     * - description: (optional)
     * - username: (optional)
     *
     * @param array $params Parameters for apiapp/update API.
     * @return Result The result of the apiapp/update API.
     */
    public function update(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'update', $params);
    }
}
