<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to LandmarkGroups.
 */
class LandmarkGroup extends ServiceClient
{
    const SERVICE = 'landmarkgroup';

    /**
     * Create a landmark group.
     *
     * Valid parameters:
     *
     * - group: name for new landmark group
     *
     * @param array $params Parameters for landmarkgroup/create API.
     * @return Result The result of the landmarkgroup/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Add a landmark to a landmark group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     * - landmark: the landmark name to add
     *
     * @param array $params Parameters for landmarkgroup/addlandmark API.
     * @return Result The result of the landmarkgroup/addlandmark API.
     */
    public function addLandmark(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addlandmark', $params);
    }

    /**
     * Add user permission to a landmark group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     * - username: the username name to add
     *
     * @param array $params Parameters for landmarkgroup/adduser API.
     * @return Result The result of the landmarkgroup/adduser API.
     */
    public function addUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'adduser', $params);
    }

    /**
     * List all landmarks.
     *
     * Valid parameters:
     *
     * - group: landmark group id or full name
     *
     * @param array $params Parameters for landmarkgroup/listmembers API.
     * @return Result The result of the landmarkgroup/listmembers API.
     */
    public function listMembers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listmembers', $params);
    }

    /**
     * list all groups and their landmarks.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for landmarkgroup/listgroupsandlandmarkids API.
     * @return Result The result of the landmarkgroup/listgroupsandlandmarkids API.
     */
    public function listGroupsAndLandmarkIds(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listgroupsandlandmarkids', $params);
    }

    /**
     * List all landmark groups.
     *
     * Valid parameters:
     *
     * - include_members: (optional - default: 0) Include landmarks for each group
     *
     * @param array $params Parameters for landmarkgroup/list API.
     * @return Result The result of the landmarkgroup/list API.
     */
    public function listLandmarkGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Delete a landmark group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     *
     * @param array $params Parameters for landmarkgroup/remove API.
     * @return Result The result of the landmarkgroup/remove API.
     */
    public function remove(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'remove', $params);
    }

    /**
     * Remove a landmark from a landmark group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     * - landmark: the landmark name to remove
     *
     * @param array $params Parameters for landmarkgroup/removelandmark API.
     * @return Result The result of the landmarkgroup/removelandmark API.
     */
    public function removeLandmark(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removelandmark', $params);
    }

    /**
     * Remove user permission from a landmark group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     * - landmark: the landmark name to remove
     *
     * @param array $params Parameters for landmarkgroup/removeuser API.
     * @return Result The result of the landmarkgroup/removeuser API.
     */
    public function removeUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeuser', $params);
    }

    /**
     * Idle time for vehicle group in landmark group.
     *
     * Valid parameters:
     *
     * - hours: Hours to look back for idle stops (from current time, default 24)
     * - vehicle_group: the vehicle group name or id
     * - landmark_group: the landmark group in which to check idle stops
     *
     * @param array $params Parameters for landmarkgroup/idletime API.
     * @return Result The result of the landmarkgroup/idletime API.
     */
    public function idleTime(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'idletime', $params);
    }

    /**
     * Specify the full list of landmarks for this group. All Landmarks will be reset.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     * - landmark: a comma-separated set of landmarks or ids
     * - count: as a check, the number of landmarks to add (required for landmarks > 1)
     *
     * @param array $params Parameters for landmarkgroup/setlandmarks API.
     * @return Result The result of the landmarkgroup/setlandmarks API.
     */
    public function setLandmarks(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setlandmarks', $params);
    }

    /**
     * Clear cached sets of landmark data for your account (new landmark data will be generated from a database query).
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for landmarkgroup/clearcache API.
     * @return Result The result of the landmarkgroup/clearcache API.
     */
    public function clearCache(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'clearcache', $params);
    }
}
