<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to VehicleGroups.
 */
class VehicleGroup extends ServiceClient
{
    const SERVICE = 'vehiclegroup';

    /**
     * Create a new vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: The new vehicle group's name
     * - vehicles: Vehicles to add to this group (comma-separated, optional)
     *
     * @param array $params Parameters for vehiclegroup/create API.
     * @return Result The result of the vehiclegroup/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Add user permission to a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - username: the username name to add
     *
     * @param array $params Parameters for vehiclegroup/adduser API.
     * @return Result The result of the vehiclegroup/adduser API.
     */
    public function addUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'adduser', $params);
    }

    /**
     * Add a vehicle to a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name
     * - vehicle: the vehicle name to add
     * - vehicles: multiple vehicles (comma-separated, optional)
     * - count: as a check, the number of vehicles to add (required for vehicles > 1)
     *
     * @param array $params Parameters for vehiclegroup/addvehicle API.
     * @return Result The result of the vehiclegroup/addvehicle API.
     */
    public function addVehicle(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addvehicle', $params);
    }

    /**
     * Return Begin/End Day report information for a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - skip_first_stop: Whether to skip the first stop (1) or not (0 - default) (optional)
     *
     * @param array $params Parameters for vehiclegroup/beginendday API.
     * @return Result The result of the vehiclegroup/beginendday API.
     */
    public function beginEndDay(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'beginendday', $params);
    }

    /**
     * Delete vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group to delete
     *
     * @param array $params Parameters for vehiclegroup/delete API.
     * @return Result The result of the vehiclegroup/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Return Drive Time Summary report information for a vehicle group (optional).
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - each_day: Whether to apply the start/end time range to each day separately (optional)
     * - overlap: Whether to include trips that overlap the start/end date (1) or not (0 - default)
     * - include_pto: Whether to include PTO in the calculations (1) or not (0 - default) (optional)
     *
     * @param array $params Parameters for vehiclegroup/drivetimesummary API.
     * @return Result The result of the vehiclegroup/drivetimesummary API.
     */
    public function driveTimeSummary(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'drivetimesummary', $params);
    }

    /**
     * Return DTC Alert report information for a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for vehiclegroup/dtc API.
     * @return Result The result of the vehiclegroup/dtc API.
     */
    public function dtc(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'dtc', $params);
    }

    /**
     * Get attributes for a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name
     * - key: (optional) attribute key
     *
     * @param array $params Parameters for vehiclegroup/getattributes API.
     * @return Result The result of the vehiclegroup/getattributes API.
     */
    public function getAttributes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getattributes', $params);
    }

    /**
     * Return Idle Detail report information for a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - idle_min: Idle threshold in minutes (shorter idle stops will be excluded) (optional)
     * - show_all: Show all vehicles (whether they had idle activity or not) (optional)
     *
     * @param array $params Parameters for vehiclegroup/idledetail API.
     * @return Result The result of the vehiclegroup/idledetail API.
     */
    public function idleDetail(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'idledetail', $params);
    }

    /**
     * Return Idle Summary report information for a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - idle_min: Idle threshold in minutes (shorter idle stops will be excluded) (optional)
     * - show_all: Show all vehicles (whether they had idle activity or not) (optional)
     * - hide_drivers: Hide information about drivers in output (optional)
     *
     * @param array $params Parameters for vehiclegroup/idlesummary API.
     * @return Result The result of the vehiclegroup/idlesummary API.
     */
    public function idleSummary(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'idlesummary', $params);
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
     * @param array $params Parameters for vehiclegroup/landmarkidle API.
     * @return Result The result of the vehiclegroup/landmarkidle API.
     */
    public function landmarkIdle(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'landmarkidle', $params);
    }

    /**
     * List all available vehicle groups.
     *
     * Valid parameters:
     *
     * - minimum_count: show only vehicle groups with a minimum number of vehicles
     * - nonzero: show only vehicle groups with one or more member vehicles
     * - vehicle_group: (optional) show a single group
     * - include_members: (optional) include members of each group
     *
     * @param array $params Parameters for vehiclegroup/list API.
     * @return Result The result of the vehiclegroup/list API.
     */
    public function listVehicleGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * List vehicles in a group DEPRECATED: use /VehicleGroup/listVehicles.
     *
     * Valid parameters:
     *
     * - vehicle_group: vehicle group id or name
     *
     * @param array $params Parameters for vehiclegroup/listmembers API.
     * @return Result The result of the vehiclegroup/listmembers API.
     */
    public function listMembers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listmembers', $params);
    }

    /**
     * DEPRECATED: use /hierarchy/listVehicles.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for vehiclegroup/listmembersfromhierarchy API.
     * @return Result The result of the vehiclegroup/listmembersfromhierarchy API.
     */
    public function listMembersFromHierarchy(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listmembersfromhierarchy', $params);
    }

    /**
     * List users assigned to this group.
     *
     * Valid parameters:
     *
     * - vehicle_group: vehicle group id or name
     *
     * @param array $params Parameters for vehiclegroup/listusers API.
     * @return Result The result of the vehiclegroup/listusers API.
     */
    public function listUsers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listusers', $params);
    }

    /**
     * List vehicles in a group.
     *
     * Valid parameters:
     *
     * - vehicle_group: vehicle group id or name
     *
     * @param array $params Parameters for vehiclegroup/listvehicles API.
     * @return Result The result of the vehiclegroup/listvehicles API.
     */
    public function listVehicles(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listvehicles', $params);
    }

    /**
     * Location and information for a specified group.
     *
     * Valid parameters:
     *
     * - vehicle_group: vehicle group name, group_id, or partial group name
     * - last_exec_time: return only new vehicle data since last call (MST, optional)
     * - historical_time: set a time at which to gather vehicle locations (optional)
     *
     * @param array $params Parameters for vehiclegroup/location API.
     * @return Result The result of the vehiclegroup/location API.
     */
    public function location(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'location', $params);
    }

    /**
     * List all vehicles accessible by this user with maintenance.
     *
     * Valid parameters:
     *
     * - groupId: the vehicle group id
     * - orderBy: (optional)
     *
     * @param array $params Parameters for vehiclegroup/maintenance API.
     * @return Result The result of the vehiclegroup/maintenance API.
     */
    public function maintenance(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'maintenance', $params);
    }

    /**
     * Return Posted Speed report information for a vehicle group to 0).
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - exceeds_by: MPH over the speed limit before reported (optional - defaults to 10)
     * - sustained_threshold: Duration threshold in minutes for a true speed violation (optional - defaults
     *
     * @param array $params Parameters for vehiclegroup/postedspeed API.
     * @return Result The result of the vehiclegroup/postedspeed API.
     */
    public function postedSpeed(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'postedspeed', $params);
    }

    /**
     * List a single vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: a vehicle group id or name
     *
     * @param array $params Parameters for vehiclegroup/read API.
     * @return Result The result of the vehiclegroup/read API.
     */
    public function read(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'read', $params);
    }

    /**
     * Remove a vehicle from a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name
     * - vehicle: the vehicle name to remove ('all' to remove all vehicles)
     * - vehicles: multiple vehicles (comma-separated, optional)
     * - count: as a check, the number of vehicles to add (required for vehicles > 1)
     *
     * @param array $params Parameters for vehiclegroup/removevehicle API.
     * @return Result The result of the vehiclegroup/removevehicle API.
     */
    public function removeVehicle(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removevehicle', $params);
    }

    /**
     * Remove user permission from a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - username: the username name to remove ('all' to remove all users)
     * - usernames: multiple usernames (comma-separated, optional)
     *
     * @param array $params Parameters for vehiclegroup/removeuser API.
     * @return Result The result of the vehiclegroup/removeuser API.
     */
    public function removeUser(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeuser', $params);
    }

    /**
     * Runtime information for a specific group.
     *
     * Valid parameters:
     *
     * - vehicle_group: vehicle group name, group_id, or partial group name
     * - date: return runtime data for this date (optional)
     * - start: start of a date span (optional)
     * - end: end date for a date span (optional)
     *
     * @param array $params Parameters for vehiclegroup/runtime API.
     * @return Result The result of the vehiclegroup/runtime API.
     */
    public function runtime(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'runtime', $params);
    }

    /**
     * Return Service History report information for a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for vehiclegroup/servicehistory API.
     * @return Result The result of the vehiclegroup/servicehistory API.
     */
    public function serviceHistory(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'servicehistory', $params);
    }

    /**
     * Specify the full list of vehicles for this group. All vehicles will be reset.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name
     * - vehicles: a comma-separated set of vehicles or ids
     * - count: as a check, the number of vehicles to add (required for vehicles > 1)
     *
     * @param array $params Parameters for vehiclegroup/setvehicles API.
     * @return Result The result of the vehiclegroup/setvehicles API.
     */
    public function setVehicles(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setvehicles', $params);
    }

    /**
     * Specify the full list of users for this group. All users will be reset.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name
     * - users: a comma-separated set of usernames
     *
     * @param array $params Parameters for vehiclegroup/setusers API.
     * @return Result The result of the vehiclegroup/setusers API.
     */
    public function setUsers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setusers', $params);
    }

    /**
     * Return State Mileage report information for a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name or id
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for vehiclegroup/statemileage API.
     * @return Result The result of the vehiclegroup/statemileage API.
     */
    public function stateMileage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'statemileage', $params);
    }

    /**
     * Specify a new label for this group.
     *
     * Valid parameters:
     *
     * - vehicle_group: the vehicle group name
     * - label: the new vehicle group name
     *
     * @param array $params Parameters for vehiclegroup/update API.
     * @return Result The result of the vehiclegroup/update API.
     */
    public function update(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'update', $params);
    }
}
