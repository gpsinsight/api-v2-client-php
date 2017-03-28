<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Users.
 */
class User extends ServiceClient
{
    const SERVICE = 'user';

    /**
     * Add user permission for a landmark group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name or id
     * - username: the username name to add
     *
     * @param array $params Parameters for user/addlandmarkgroup API.
     * @return Result The result of the user/addlandmarkgroup API.
     */
    public function addLandmarkGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addlandmarkgroup', $params);
    }

    /**
     * Add user permission for a vehicle group.
     *
     * Valid parameters:
     *
     * - group: the vehicle group name or id
     * - username: the username name to add
     * - groups: multiple groups (comma-separated, optional)
     *
     * @param array $params Parameters for user/addvehiclegroup API.
     * @return Result The result of the user/addvehiclegroup API.
     */
    public function addVehicleGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addvehiclegroup', $params);
    }

    /**
     * Register a new user to the GPSI system. (optional).
     *
     * Valid parameters:
     *
     * - username: Global-unique username for the new user
     * - password: 6-20 character combination
     * - address: (optional)
     * - city: (optional)
     * - country: (optional)
     * - email: (optional)
     * - firstname: (optional)
     * - lastname: (optional)
     * - phone: (optional)
     * - state: (optional)
     * - timezone: (US/Pacific, US/Arizona, US/Mountain, US/Central, US/Eastern, Europe/London, UTC, etc)
     *
     * @param array $params Parameters for user/create API.
     * @return Result The result of the user/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Delete a user from an account.
     *
     * Valid parameters:
     *
     * - username
     *
     * @param array $params Parameters for user/delete API.
     * @return Result The result of the user/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * get the value for the specified preference.
     *
     * Valid parameters:
     *
     * - preference: the preference to get.  if not set, returns all preferences
     * - accountLevel: if 1, gets the preference for the account if 0, gets the preference for the user
     *
     * @param array $params Parameters for user/getpreference API.
     * @return Result The result of the user/getpreference API.
     */
    public function getPreference(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getpreference', $params);
    }

    /**
     * List all available apps for this user.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for user/list API.
     * @return Result The result of the user/list API.
     */
    public function listUserApps(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Set of users as a simple list.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for user/listusers API.
     * @return Result The result of the user/listusers API.
     */
    public function listUsers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listusers', $params);
    }

    /**
     * List of all the vehicles available to this user.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for user/listvehicles API.
     * @return Result The result of the user/listvehicles API.
     */
    public function listVehicles(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listvehicles', $params);
    }

    /**
     * Returns vehicle groups the user is assigned to.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for user/listvehiclegroups API.
     * @return Result The result of the user/listvehiclegroups API.
     */
    public function listVehicleGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listvehiclegroups', $params);
    }

    /**
     * Read info for a single username.
     *
     * Valid parameters:
     *
     * - username
     *
     * @param array $params Parameters for user/read API.
     * @return Result The result of the user/read API.
     */
    public function read(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'read', $params);
    }

    /**
     * Add user permission for a landmark group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name or id
     * - username: the username name to add
     *
     * @param array $params Parameters for user/removelandmarkgroup API.
     * @return Result The result of the user/removelandmarkgroup API.
     */
    public function removeLandmarkGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removelandmarkgroup', $params);
    }

    /**
     * Remove user permission from a vehicle group.
     *
     * Valid parameters:
     *
     * - username: the username name to remove
     * - group: the vehicle group name or id ('all' to remove all groups)
     * - groups: multiple usernames (comma-separated, optional)
     *
     * @param array $params Parameters for user/removevehiclegroup API.
     * @return Result The result of the user/removevehiclegroup API.
     */
    public function removeVehicleGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removevehiclegroup', $params);
    }

    /**
     * Specify the full list of vehicle groups for this user. All groups will be reset.
     *
     * Valid parameters:
     *
     * - groups: a comma-separated list of vehicle groups
     * - user: the username to assign
     *
     * @param array $params Parameters for user/setvehiclegroups API.
     * @return Result The result of the user/setvehiclegroups API.
     */
    public function setVehicleGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setvehiclegroups', $params);
    }

    /**
     * get the timezone list for the logged in user.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for user/timezonelist API.
     * @return Result The result of the user/timezonelist API.
     */
    public function timezoneList(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'timezonelist', $params);
    }

    /**
     * get timezone list for a certain country.
     *
     * Valid parameters:
     *
     * - country: the two-letter code for the country to get. Examples include "us", "ca", "mx", "uk".
     *
     * @param array $params Parameters for user/timezonelistforcountry API.
     * @return Result The result of the user/timezonelistforcountry API.
     */
    public function timezoneListForCountry(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'timezonelistforcountry', $params);
    }

    /**
     * Update information for a user. (optional).
     *
     * Valid parameters:
     *
     * - username: Username for the user to be updated
     * - address: (optional)
     * - city: (optional)
     * - country: (optional)
     * - email: (optional)
     * - firstname: (optional)
     * - lastname: (optional)
     * - phone: (optional)
     * - state: (optional)
     * - timezone: (US/Pacific, US/Arizona, US/Mountain, US/Central, US/Eastern, Europe/London, UTC, etc)
     *
     * @param array $params Parameters for user/update API.
     * @return Result The result of the user/update API.
     */
    public function update(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'update', $params);
    }

    /**
     * List timezone information for user.
     *
     * Valid parameters:
     *
     * - username
     *
     * @param array $params Parameters for user/timezone API.
     * @return Result The result of the user/timezone API.
     */
    public function timezone(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'timezone', $params);
    }
}
