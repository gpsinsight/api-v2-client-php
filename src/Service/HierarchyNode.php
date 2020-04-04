<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to HierarchyNodes.
 */
class HierarchyNode extends ServiceClient
{
    const SERVICE = 'hierarchynode';

    /**
     * Associate a driver to a hierarchy node. partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/adddriver API.
     * @return Result The result of the hierarchynode/adddriver API.
     */
    public function addDriver(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'adddriver', $params);
    }

    /**
     * Associate a landmark to a hierarchy node.
     *
     * Valid parameters:
     *
     * - landmark: landmark_id or full landmark name
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/addlandmark API.
     * @return Result The result of the hierarchynode/addlandmark API.
     */
    public function addLandmark(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addlandmark', $params);
    }

    /**
     * Add a child node to a hierarchy node.
     *
     * Valid parameters:
     *
     * - label: Label of the new node
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/addnode API.
     * @return Result The result of the hierarchynode/addnode API.
     */
    public function addNode(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addnode', $params);
    }

    /**
     * Associate a user to a hierarchy node (as member).
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - username: Login name of the user
     *
     * @param array $params Parameters for hierarchynode/adduser API.
     * @return Result The result of the hierarchynode/adduser API.
     */
    public function addUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'adduser', $params);
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
     * @param array $params Parameters for hierarchynode/adduseraccess API.
     * @return Result The result of the hierarchynode/adduseraccess API.
     */
    public function addUserAccess(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'adduseraccess', $params);
    }

    /**
     * Associate a vehicle to a hierarchy node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - vehicle: VIN, serial number, or partial or full vehicle label
     *
     * @param array $params Parameters for hierarchynode/addvehicle API.
     * @return Result The result of the hierarchynode/addvehicle API.
     */
    public function addVehicle(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addvehicle', $params);
    }

    /**
     * Return Begin/End Day report information for a hierarchy node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - skip_first_stop: Whether to skip the first stop (1) or not (0 - default) (optional)
     *
     * @param array $params Parameters for hierarchynode/beginendday API.
     * @return Result The result of the hierarchynode/beginendday API.
     */
    public function beginEndDay(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'beginendday', $params);
    }

    /**
     * Delete a node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/delete API.
     * @return Result The result of the hierarchynode/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Return Drive Time Summary report information for a hierarchy node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date (optional - defaults to today)
     * - end: End date (optional - defaults to end of today)
     * - include_pto: Whether to include PTO in the calculations (1) or not (0 - default) (optional)
     *
     * @param array $params Parameters for hierarchynode/drivetimesummary API.
     * @return Result The result of the hierarchynode/drivetimesummary API.
     */
    public function driveTimeSummary(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'drivetimesummary', $params);
    }

    /**
     * Return Idle Detail report information for a hierarchy node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - idle_min: Idle threshold in minutes (shorter idle stops will be excluded) (optional)
     * - show_all: Show all vehicles (whether they had idle activity or not) (optional)
     *
     * @param array $params Parameters for hierarchynode/idledetail API.
     * @return Result The result of the hierarchynode/idledetail API.
     */
    public function idleDetail(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'idledetail', $params);
    }

    /**
     * Return Idle Summary report information for a hierarchy node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - idle_min: Idle threshold in minutes (shorter idle stops will be excluded) (optional)
     * - show_all: Show all vehicles (whether they had idle activity or not) (optional)
     * - hide_drivers: Hide information about drivers in output (optional)
     *
     * @param array $params Parameters for hierarchynode/idlesummary API.
     * @return Result The result of the hierarchynode/idlesummary API.
     */
    public function idleSummary(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'idlesummary', $params);
    }

    /**
     * Lifetime utilization for all vehicles under a particular tree node, including run days, run time, stop time,
     * idle time, miles driver, max speed, and average speed.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/lifetimeutilization API.
     * @return Result The result of the hierarchynode/lifetimeutilization API.
     */
    public function lifetimeUtilization(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'lifetimeutilization', $params);
    }

    /**
     * List all child nodes and associated members under a node in hierarchical or flat format.
     *
     * Valid parameters:
     *
     * - flatten: 0=hierarchical output (default), 1=flat format
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - types: Member types (optional, default: 'DLUV') D=driver, L=landmark, U=user, V=vehicle
     * - depth: How far down the tree to traverse for this request
     *
     * @param array $params Parameters for hierarchynode/list API.
     * @return Result The result of the hierarchynode/list API.
     */
    public function listHierarchyNodes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * List all child nodes under a node in hierarchical format.
     *
     * Valid parameters:
     *
     * - flatten: 0=hierarchical output (default), 1=flat format
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/listnodes API.
     * @return Result The result of the hierarchynode/listnodes API.
     */
    public function listNodes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listnodes', $params);
    }

    /**
     * Return location and information for a specified node.
     *
     * Valid parameters:
     *
     * - last_exec_time: return only new vehicle data since last call (MST)
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/location API.
     * @return Result The result of the hierarchynode/location API.
     */
    public function location(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'location', $params);
    }

    /**
     * Return Posted Speed report information for a hierarchy node to 0).
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - exceeds_by: MPH over the speed limit before reported (optional - defaults to 10)
     * - sustained_threshold: Duration threshold in minutes for a true speed violation (optional - defaults
     *
     * @param array $params Parameters for hierarchynode/postedspeed API.
     * @return Result The result of the hierarchynode/postedspeed API.
     */
    public function postedSpeed(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'postedspeed', $params);
    }

    /**
     * Return Posted Speed violation ranges for a vehicle.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for hierarchynode/postedspeedrange API.
     * @return Result The result of the hierarchynode/postedspeedrange API.
     */
    public function postedSpeedRange(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'postedspeedrange', $params);
    }

    /**
     * Return location and information for a specified node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree
     * - label: New label for this node
     *
     * @param array $params Parameters for hierarchynode/rename API.
     * @return Result The result of the hierarchynode/rename API.
     */
    public function rename(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'rename', $params);
    }

    /**
     * Remove a driver member from a tree. partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/removedriver API.
     * @return Result The result of the hierarchynode/removedriver API.
     */
    public function removeDriver(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removedriver', $params);
    }

    /**
     * Remove a landmark member from a tree.
     *
     * Valid parameters:
     *
     * - landmark: landmark_id or full landmark name
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/removelandmark API.
     * @return Result The result of the hierarchynode/removelandmark API.
     */
    public function removeLandmark(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removelandmark', $params);
    }

    /**
     * Remove a user member from a tree.
     *
     * Valid parameters:
     *
     * - tree: Label or ID of the tree (optional)
     * - username: Login name of the user
     *
     * @param array $params Parameters for hierarchynode/removeuser API.
     * @return Result The result of the hierarchynode/removeuser API.
     */
    public function removeUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeuser', $params);
    }

    /**
     * Remove a vehicle member from a tree.
     *
     * Valid parameters:
     *
     * - tree: Label or ID of the tree (optional)
     * - vehicle: VIN, serial number, or partial or full vehicle name
     *
     * @param array $params Parameters for hierarchynode/removevehicle API.
     * @return Result The result of the hierarchynode/removevehicle API.
     */
    public function removeVehicle(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removevehicle', $params);
    }

    /**
     * Return Service History report information for a hierarchy node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for hierarchynode/servicehistory API.
     * @return Result The result of the hierarchynode/servicehistory API.
     */
    public function serviceHistory(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'servicehistory', $params);
    }

    /**
     * Return State Mileage report information for a hierarchy node.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for hierarchynode/statemileage API.
     * @return Result The result of the hierarchynode/statemileage API.
     */
    public function stateMileage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'statemileage', $params);
    }

    /**
     * Update the node label (alias for Rename).
     *
     * Valid parameters:
     *
     * - label: New label for this node.
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/update API.
     * @return Result The result of the hierarchynode/update API.
     */
    public function update(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'update', $params);
    }

    /**
     * List hierarchy structures starting with the search node and any associated vehicles and their locations.
     *
     * Valid parameters:
     *
     * - flatten: 0=hierarchical output (default), 1=flat format
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     *
     * @param array $params Parameters for hierarchynode/vehiclelocations API.
     * @return Result The result of the hierarchynode/vehiclelocations API.
     */
    public function vehicleLocations(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'vehiclelocations', $params);
    }

    /**
     * Returns the Fuel Card transactions for a Hierarchy Group within a date range.
     *
     * Valid parameters:
     *
     * - node: Label or ID of the node
     * - tree: Label or ID of the tree (optional)
     * - start: Date - may include hours and minutes (required) start_date
     * - end: Date - may include hours and minutes (required) end_date
     *
     * @param array $params Parameters for hierarchynode/fuelcardtransactions API.
     * @return Result The result of the hierarchynode/fuelcardtransactions API.
     */
    public function fuelCardTransactions(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'fuelcardtransactions', $params);
    }
}
