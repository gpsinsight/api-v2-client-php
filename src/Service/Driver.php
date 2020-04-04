<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Drivers.
 */
class Driver extends ServiceClient
{
    const SERVICE = 'driver';

    /**
     * Assign a driver to a vehicle. partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - effective: Date & time the assignment starts
     * - expires: Date & time the assignment ends (optional)
     * - vehicle: Valid vehicle identifier
     *
     * @param array $params Parameters for driver/assign API.
     * @return Result The result of the driver/assign API.
     */
    public function assign(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'assign', $params);
    }

    /**
     * Create a new driver. 7=email+sms+garmin) (optional).
     *
     * Valid parameters:
     *
     * - lastname
     * - firstname: (optional)
     * - ref_id: External reference ID for the driver (optional)
     * - email: (optional)
     * - phone: (optional but recommended)
     * - alert_pref: (0=none, 1=email, 2=sms, 3=email+sms (default), 4=garmin, 5=email+garmin, 6=sms+garmin,
     * - timezone: (US/Pacific, US/Arizona, US/Mountain, US/Central, US/Eastern, Europe/London, UTC, etc)
     *
     * @param array $params Parameters for driver/create API.
     * @return Result The result of the driver/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Delete the identified driver. partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     *
     * @param array $params Parameters for driver/delete API.
     * @return Result The result of the driver/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Get attributes for a driver partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - key: (optional) attribute key
     *
     * @param array $params Parameters for driver/getattributes API.
     * @return Result The result of the driver/getattributes API.
     */
    public function getAttributes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getattributes', $params);
    }

    /**
     * Link a driver to a driver group partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - group: Name of the driver group
     *
     * @param array $params Parameters for driver/joingroup API.
     * @return Result The result of the driver/joingroup API.
     */
    public function joinGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'joingroup', $params);
    }

    /**
     * Un-link a driver from a driver group partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - group: Name of the driver group
     *
     * @param array $params Parameters for driver/leavegroup API.
     * @return Result The result of the driver/leavegroup API.
     */
    public function leaveGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'leavegroup', $params);
    }

    /**
     * Return a list of all drivers to which this user has access.
     *
     * Valid parameters:
     *
     * - driver: (optional) show a single driver
     *
     * @param array $params Parameters for driver/list API.
     * @return Result The result of the driver/list API.
     */
    public function listDrivers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Show all group for a driver partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     *
     * @param array $params Parameters for driver/listdrivergroups API.
     * @return Result The result of the driver/listdrivergroups API.
     */
    public function listDriverGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listdrivergroups', $params);
    }

    /**
     * Return current and overdue service reminders for a particular vehicle partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     *
     * @param array $params Parameters for driver/servicereminder API.
     * @return Result The result of the driver/servicereminder API.
     */
    public function serviceReminder(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'servicereminder', $params);
    }

    /**
     * Un-assign a driver from a vehicle. partial first names).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - expires: Date & time the assignment ends (optional)
     * - vehicle: Vehicle identifier
     *
     * @param array $params Parameters for driver/unassign API.
     * @return Result The result of the driver/unassign API.
     */
    public function unassign(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'unassign', $params);
    }

    /**
     * Update certain driver information. Specify "driver" to identify the record to update, the other fields
     * (firstname, lastname, etc.) will be updated. partial first names) 7=email+sms+garmin) (optional) (optional).
     *
     * Valid parameters:
     *
     * - driver: Driver identifier (searches in order refid, id, last, first, first last, partial last,
     * - lastname: (optional)
     * - firstname: (optional)
     * - ref_id: External reference ID (optional)
     * - email: (optional)
     * - alert_pref: (0=none, 1=email, 2=sms, 3=email+sms (default), 4=garmin, 5=email+garmin, 6=sms+garmin,
     * - phone: (optional)
     * - timezone: (US/Pacific, US/Arizona, US/Mountain, US/Central, US/Eastern, Europe/London, UTC, etc)
     *
     * @param array $params Parameters for driver/update API.
     * @return Result The result of the driver/update API.
     */
    public function update(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'update', $params);
    }

    /**
     * Return all drivers associated to the user making the request. Returned drivers will have the vehicle/location
     * information of the vehicle currently assigned, if any.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for driver/locations API.
     * @return Result The result of the driver/locations API.
     */
    public function locations(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'locations', $params);
    }

    /**
     * Get the current input status for the driver group.
     *
     * Valid parameters:
     *
     * - driver_group: the driver group name / id
     *
     * @param array $params Parameters for driver/inputs API.
     * @return Result The result of the driver/inputs API.
     */
    public function inputs(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'inputs', $params);
    }
}
