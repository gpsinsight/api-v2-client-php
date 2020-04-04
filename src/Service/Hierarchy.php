<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Hierarchies.
 */
class Hierarchy extends ServiceClient
{
    const SERVICE = 'hierarchy';

    /**
     * Add a node to the root tree node.
     *
     * Valid parameters:
     *
     * - label: Label of the new node
     * - tree: Label or ID of the search tree
     *
     * @param array $params Parameters for hierarchy/addnode API.
     * @return Result The result of the hierarchy/addnode API.
     */
    public function addNode(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addnode', $params);
    }

    /**
     * Add a user for permissions on this tree.
     *
     * Valid parameters:
     *
     * - username
     * - tree: Label or ID of the search tree
     * - node: Node of where to start on the tree
     * - depth: How far down the tree to give permisisons
     *
     * @param array $params Parameters for hierarchy/adduser API.
     * @return Result The result of the hierarchy/adduser API.
     */
    public function addUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'adduser', $params);
    }

    /**
     * Create a new hierarchy tree.
     *
     * Valid parameters:
     *
     * - label: Label for the new tree
     * - refid: External reference ID (optional)
     *
     * @param array $params Parameters for hierarchy/create API.
     * @return Result The result of the hierarchy/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Delete a hierarchy tree.
     *
     * Valid parameters:
     *
     * - tree: Label or ID of the search tree (optional)
     *
     * @param array $params Parameters for hierarchy/delete API.
     * @return Result The result of the hierarchy/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Get the current input status for the vehicle hierarchy.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for hierarchy/inputs API.
     * @return Result The result of the hierarchy/inputs API.
     */
    public function inputs(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'inputs', $params);
    }

    /**
     * Lifetime utilization for all vehicles under a particular tree, including run days, run time, stop time, idle
     * time, miles driver, max speed, and average speed.
     *
     * Valid parameters:
     *
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchy/lifetimeutilization API.
     * @return Result The result of the hierarchy/lifetimeutilization API.
     */
    public function lifetimeUtilization(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'lifetimeutilization', $params);
    }

    /**
     * List all hierarchy trees accesible to this user.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for hierarchy/list API.
     * @return Result The result of the hierarchy/list API.
     */
    public function listHierarchies(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Show a list of the nodes in this tree that are populated with vehicles (or other type).
     *
     * Valid parameters:
     *
     * - tree: Label or ID of the search tree
     * - type: Hierarchy member type to count (optional, default V) D=driver, L=landmark, U=user, V=vehicle
     * - min_count: Show only nodes with a minimum number of members (optional, default 0)
     * - rollup: Show vehicle counts including roll-up of child nodes (optional, default 1)
     *
     * @param array $params Parameters for hierarchy/listnodes API.
     * @return Result The result of the hierarchy/listnodes API.
     */
    public function listNodes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listnodes', $params);
    }

    /**
     * Remove a driver member from a tree. (allow from tree-level for convenience) partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - tree: Label or ID of the search tree
     *
     * @param array $params Parameters for hierarchy/removedriver API.
     * @return Result The result of the hierarchy/removedriver API.
     */
    public function removeDriver(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removedriver', $params);
    }

    /**
     * Remove a landmark member from a tree. (allow from tree-level for convenience).
     *
     * Valid parameters:
     *
     * - landmark: landmark_id or full landmark name
     * - tree: Label or ID of the search tree
     *
     * @param array $params Parameters for hierarchy/removelandmark API.
     * @return Result The result of the hierarchy/removelandmark API.
     */
    public function removeLandmark(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removelandmark', $params);
    }

    /**
     * Remove a user member from a tree. (allow from tree-level for convenience).
     *
     * Valid parameters:
     *
     * - tree: Label or ID of the search tree
     * - username: Login name of the user
     *
     * @param array $params Parameters for hierarchy/removeuser API.
     * @return Result The result of the hierarchy/removeuser API.
     */
    public function removeUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeuser', $params);
    }

    /**
     * Remove a vehicle member from a tree. (allow from tree-level for convenience).
     *
     * Valid parameters:
     *
     * - tree: Label or ID of the search tree
     * - vehicle: VIN, serial number, or partial or full vehicle label
     *
     * @param array $params Parameters for hierarchy/removevehicle API.
     * @return Result The result of the hierarchy/removevehicle API.
     */
    public function removeVehicle(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removevehicle', $params);
    }

    /**
     * .
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for hierarchy/servicereminder API.
     * @return Result The result of the hierarchy/servicereminder API.
     */
    public function serviceReminder(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'servicereminder', $params);
    }

    /**
     * get all group hierarchy nodes for the user @returns array.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for hierarchy/listgroups API.
     * @return Result The result of the hierarchy/listgroups API.
     */
    public function listGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listgroups', $params);
    }

    /**
     * get a list of vehicle group ids and vins.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for hierarchy/listgroupsvehicles API.
     * @return Result The result of the hierarchy/listgroupsvehicles API.
     */
    public function listGroupsVehicles(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listgroupsvehicles', $params);
    }
}
