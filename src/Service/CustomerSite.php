<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to CustomerSites.
 */
class CustomerSite extends ServiceClient
{
    const SERVICE = 'customersite';

    /**
     * Create a new Customer Site.
     *
     * Valid parameters:
     *
     * - name: Name of the Customer Site
     *
     * @param array $params Parameters for customersite/create API.
     * @return Result The result of the customersite/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Add a vehicle group to a Customer Site.
     *
     * Valid parameters:
     *
     * - id: int The id of the Customer Site you are modifying
     * - group_id: The group id to add to the Customer Site
     *
     * @param array $params Parameters for customersite/addvehiclegroup API.
     * @return Result The result of the customersite/addvehiclegroup API.
     */
    public function addVehicleGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addvehiclegroup', $params);
    }

    /**
     * List all Customer Sites.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for customersite/list API.
     * @return Result The result of the customersite/list API.
     */
    public function listCustomerSites(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Delete a Customer site.
     *
     * Valid parameters:
     *
     * - cutomer_site: Name or ID of the Customer Site
     *
     * @param array $params Parameters for customersite/delete API.
     * @return Result The result of the customersite/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }
}
