<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to DriverGroups.
 */
class DriverGroup extends ServiceClient
{
    const SERVICE = 'drivergroup';

    /**
     * Add a driver to a driver group.
     *
     * Valid parameters:
     *
     * - id: (optional-used to ID driver)
     * - firstname: (optional-used to ID driver)
     * - group: Driver group name
     * - lastname: (optional-used to ID driver)
     * - refid: External reference (optional-used to ID driver)
     *
     * @param array $params Parameters for drivergroup/addmember API.
     * @return Result The result of the drivergroup/addmember API.
     */
    public function addMember(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addmember', $params);
    }

    /**
     * Add user permission to a driver group.
     *
     * Valid parameters:
     *
     * - group: the driver group name or ID
     * - username
     *
     * @param array $params Parameters for drivergroup/adduser API.
     * @return Result The result of the drivergroup/adduser API.
     */
    public function addUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'adduser', $params);
    }

    /**
     * Create a driver group.
     *
     * Valid parameters:
     *
     * - group: name for new driver group
     *
     * @param array $params Parameters for drivergroup/create API.
     * @return Result The result of the drivergroup/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Delete a driver group.
     *
     * Valid parameters:
     *
     * - group: the driver group name
     *
     * @param array $params Parameters for drivergroup/delete API.
     * @return Result The result of the drivergroup/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Get attributes for a driver group.
     *
     * Valid parameters:
     *
     * - group: driver group name or ID
     * - key: (optional) Attribute key ID or name
     * - trip_style: (optional) 0=non-trip (default), 1=trip only, 2=stop only, 3=trip and stop
     * - start: (optional) Start of date range to search (not used if trip_bm=0)
     * - end: (optional) End of date range to search (not used if trip_bm=0)
     *
     * @param array $params Parameters for drivergroup/getattributes API.
     * @return Result The result of the drivergroup/getattributes API.
     */
    public function getAttributes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getattributes', $params);
    }

    /**
     * List all drivers.
     *
     * Valid parameters:
     *
     * - group_id: the group id (optional)
     * - driver: show a specific driver by label or driver_id (optional)
     *
     * @param array $params Parameters for drivergroup/listmembers API.
     * @return Result The result of the drivergroup/listmembers API.
     */
    public function listMembers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listmembers', $params);
    }

    /**
     * Get the current input status for the driver group.
     *
     * Valid parameters:
     *
     * - driver_group: the driver group name / id
     *
     * @param array $params Parameters for drivergroup/inputs API.
     * @return Result The result of the drivergroup/inputs API.
     */
    public function inputs(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'inputs', $params);
    }

    /**
     * List all driver groups.
     *
     * Valid parameters:
     *
     * - group: (optional) show a single group
     *
     * @param array $params Parameters for drivergroup/list API.
     * @return Result The result of the drivergroup/list API.
     */
    public function listDriverGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * List all users with access to a driver group.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for drivergroup/listusers API.
     * @return Result The result of the drivergroup/listusers API.
     */
    public function listUsers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listusers', $params);
    }

    /**
     * Remove a driver from a driver group.
     *
     * Valid parameters:
     *
     * - group: the driver group name
     * - driver: the driver name to remove
     *
     * @param array $params Parameters for drivergroup/removedriver API.
     * @return Result The result of the drivergroup/removedriver API.
     */
    public function removeDriver(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removedriver', $params);
    }

    /**
     * Remove user access to a driver group.
     *
     * Valid parameters:
     *
     * - group: the driver group name
     * - username
     *
     * @param array $params Parameters for drivergroup/removeuser API.
     * @return Result The result of the drivergroup/removeuser API.
     */
    public function removeUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeuser', $params);
    }

    /**
     * Return current and overdue service reminders for a vehicle group.
     *
     * Valid parameters:
     *
     * - group: the driver group name
     *
     * @param array $params Parameters for drivergroup/servicereminder API.
     * @return Result The result of the drivergroup/servicereminder API.
     */
    public function serviceReminder(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'servicereminder', $params);
    }
}
