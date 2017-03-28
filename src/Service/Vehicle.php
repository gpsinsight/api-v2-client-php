<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Vehicles.
 */
class Vehicle extends ServiceClient
{
    const SERVICE = 'vehicle';

    /**
     * Add a maintenance alert for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - maint_label
     * - value_offset: (optional)
     * - offset_hrs: (optional)
     * - next_svc_value: (optional)
     * - next_svc_hrs: (optional)
     * - next_svc_date: (optional)
     *
     * @param array $params Parameters for vehicle/addmaintenancealert API.
     * @return Result The result of the vehicle/addmaintenancealert API.
     */
    public function addMaintenanceAlert(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addmaintenancealert', $params);
    }

    /**
     * Add a switch assignment to a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - switch: Switch ID or label (if unique to the account)
     * - bit: Bit to which the switch is assigned
     *
     * @param array $params Parameters for vehicle/addswitch API.
     * @return Result The result of the vehicle/addswitch API.
     */
    public function addSwitch(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addswitch', $params);
    }

    /**
     * Add a vehicle to a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - group: the vehicle group name or id
     * - groups: multiple groups (comma-separated, optional)
     *
     * @param array $params Parameters for vehicle/addvehiclegroup API.
     * @return Result The result of the vehicle/addvehiclegroup API.
     */
    public function addVehicleGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addvehiclegroup', $params);
    }

    /**
     * Get Attributes that apply to this vehicle attributes.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: (optional) Start of date range to search
     * - end: (optional) End of date range to search
     * - type: (optional) 0=permanent attributes, 1=trip attributes, 2=stop attributes, 3=stop and trip
     *
     * @param array $params Parameters for vehicle/attributes API.
     * @return Result The result of the vehicle/attributes API.
     */
    public function attributes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'attributes', $params);
    }

    /**
     * Return Begin/End Day report information for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - skip_first_stop: Whether to skip the first stop (1) or not (0 - default) (optional)
     *
     * @param array $params Parameters for vehicle/beginendday API.
     * @return Result The result of the vehicle/beginendday API.
     */
    public function beginEndDay(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'beginendday', $params);
    }

    /**
     * Register a vehicle to a device.
     *
     * Valid parameters:
     *
     * - serial_number
     * - label: Description of the vehicle
     * - vin
     * - color: (optional)
     * - country: (optional)
     * - fuel_capacity: (optional) In gallons
     * - fuel_type: (optional) U=Unleaded, D=Diesel, N=N/A
     * - license_number: (optional)
     * - license_state: (optional)
     * - make: (optional)
     * - model: (optional)
     * - model_year: (optional)
     * - odometer: (optional) In miles
     * - run_time: (optional) In hours
     * - engine_size: (optional) In liters
     * - idle_gph: (optional) Idle gallons per hour used
     * - icon: id group id, label, style or partial label or style (optional, first to match)
     *
     * @param array $params Parameters for vehicle/create API.
     * @return Result The result of the vehicle/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * List all switches defined for the account TODO: definedInputs would be a better name for this.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for vehicle/definedswitches API.
     * @return Result The result of the vehicle/definedswitches API.
     */
    public function definedSwitches(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'definedswitches', $params);
    }

    /**
     * Disassociate a vehicle from a device.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - reason: reason for deletion (optional)
     * - is_rental: whether device is a rental (1) or purchased (0) (optional)
     *
     * @param array $params Parameters for vehicle/delete API.
     * @return Result The result of the vehicle/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Get distance driven for a specific time period. Includes basic information on to/from locations.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id, vin, serial_number, name or partial name (first to match)
     * - date: return distance data for this date (optional)
     * - start: start time of movement (within 5 minutes, optional)
     * - end: end time for movement (within 5 minutes, optional)
     *
     * @param array $params Parameters for vehicle/distance API.
     * @return Result The result of the vehicle/distance API.
     */
    public function distance(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'distance', $params);
    }

    /**
     * Return Drive Time Summary report information for a vehicle (optional).
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - each_day: Whether to apply the start/end time range to each day separately (optional)
     * - overlap: Whether to include trips that overlap the start/end date (1) or not (0 - default)
     * - include_pto: Whether to include PTO in the calculations (1) or not (0 - default) (optional)
     *
     * @param array $params Parameters for vehicle/drivetimesummary API.
     * @return Result The result of the vehicle/drivetimesummary API.
     */
    public function driveTimeSummary(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'drivetimesummary', $params);
    }

    /**
     * Return DTC Alert report information for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for vehicle/dtc API.
     * @return Result The result of the vehicle/dtc API.
     */
    public function dtc(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'dtc', $params);
    }

    /**
     * Get attributes for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - key: (optional) attribute key
     *
     * @param array $params Parameters for vehicle/getattributes API.
     * @return Result The result of the vehicle/getattributes API.
     */
    public function getAttributes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getattributes', $params);
    }

    /**
     * Gets information about the currently-assigned driver, if any.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     *
     * @param array $params Parameters for vehicle/getdriver API.
     * @return Result The result of the vehicle/getdriver API.
     */
    public function getDriver(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getdriver', $params);
    }

    /**
     * Get an attribute from the driver assigned to a vehicle (key,value pairs).
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     *
     * @param array $params Parameters for vehicle/getdriverattributes API.
     * @return Result The result of the vehicle/getdriverattributes API.
     */
    public function getDriverAttributes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getdriverattributes', $params);
    }

    /**
     * Get the current input status for the specified vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     *
     * @param array $params Parameters for vehicle/getinputs API.
     * @return Result The result of the vehicle/getinputs API.
     */
    public function getInputs(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getinputs', $params);
    }

    /**
     * Test whether a vehicle has a Garmin device attached.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     *
     * @param array $params Parameters for vehicle/hasgarmin API.
     * @return Result The result of the vehicle/hasgarmin API.
     */
    public function hasGarmin(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'hasgarmin', $params);
    }

    /**
     * Get historical information on vehicle activity.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - date: a single day at a time
     * - location_detail: show geocoded street address and landmark, if found
     *
     * @param array $params Parameters for vehicle/history API.
     * @return Result The result of the vehicle/history API.
     */
    public function history(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'history', $params);
    }

    /**
     * Return Idle Detail report information for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - idle_min: Idle threshold in minutes (shorter idle stops will be excluded) (optional)
     * - show_all: Show all vehicles (whether they had idle activity or not) (optional)
     *
     * @param array $params Parameters for vehicle/idledetail API.
     * @return Result The result of the vehicle/idledetail API.
     */
    public function idleDetail(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'idledetail', $params);
    }

    /**
     * Return Idle Summary report information for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - idle_min: Idle threshold in minutes (shorter idle stops will be excluded) (optional)
     * - show_all: Show all vehicles (whether they had idle activity or not) (optional)
     * - hide_drivers: Hide information about drivers in output (optional)
     *
     * @param array $params Parameters for vehicle/idlesummary API.
     * @return Result The result of the vehicle/idlesummary API.
     */
    public function idleSummary(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'idlesummary', $params);
    }

    /**
     * List all vehicles or one specific vehicle accessible by this user.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (optional, first to match)
     * - detail: specify individual columns to return (optional)
     *
     * @param array $params Parameters for vehicle/list API.
     * @return Result The result of the vehicle/list API.
     */
    public function listVehicles(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Returns vehicle groups in which the specified vehicle belongs.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     *
     * @param array $params Parameters for vehicle/listvehiclegroups API.
     * @return Result The result of the vehicle/listvehiclegroups API.
     */
    public function listVehicleGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listvehiclegroups', $params);
    }

    /**
     * Location and information on vehicle.
     *
     * Valid parameters:
     *
     * - vehicle:         vehicle vin, serial_number, name or partial name (first to match, optional)
     * - last_exec_time:  return only new vehicle data since last call (MST, optional)
     * - extended:        show extra information about the vehicle (optional)
     *
     * @param array $params Parameters for vehicle/location API.
     * @return Result The result of the vehicle/location API.
     */
    public function location(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'location', $params);
    }

    /**
     * Location and information on a vehicle at a point in time.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - time: set a time at which to gather vehicle locations
     *
     * @param array $params Parameters for vehicle/locationhistorical API.
     * @return Result The result of the vehicle/locationhistorical API.
     */
    public function locationHistorical(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'locationhistorical', $params);
    }

    /**
     * Return Posted Speed report information for a vehicle to 0).
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     * - exceeds_by: MPH over the speed limit before reported (optional - defaults to 10)
     * - sustained_threshold: Duration threshold in minutes for a true speed violation (optional - defaults
     *
     * @param array $params Parameters for vehicle/postedspeed API.
     * @return Result The result of the vehicle/postedspeed API.
     */
    public function postedSpeed(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'postedspeed', $params);
    }

    /**
     * Read info for a single vehicle.
     *
     * Valid parameters:
     *
     * - vehicle
     *
     * @param array $params Parameters for vehicle/read API.
     * @return Result The result of the vehicle/read API.
     */
    public function read(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'read', $params);
    }

    /**
     * Remove a vehicle attribute.
     *
     * Valid parameters:
     *
     * - id: Numeric identifier for the attribute value
     *
     * @param array $params Parameters for vehicle/removeattribute API.
     * @return Result The result of the vehicle/removeattribute API.
     */
    public function removeAttribute(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeattribute', $params);
    }

    /**
     * Remove a vehicle attribute Key not (0-default).
     *
     * Valid parameters:
     *
     * - key: Attribute key to be deleted
     * - delete_if_empty: (optional) Delete the attribute from lists if no associated entities remain (1) or
     *
     * @param array $params Parameters for vehicle/removeattributekey API.
     * @return Result The result of the vehicle/removeattributekey API.
     */
    public function removeAttributeKey(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeattributekey', $params);
    }

    /**
     * Remove a maintenance alert for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id of vehicle
     * - maint_alert_id
     *
     * @param array $params Parameters for vehicle/removemaintenancealert API.
     * @return Result The result of the vehicle/removemaintenancealert API.
     */
    public function removeMaintenanceAlert(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removemaintenancealert', $params);
    }

    /**
     * Remove a vehicle from a vehicle group.
     *
     * Valid parameters:
     *
     * - vehicle: the vehicle name
     * - group: the vehicle group name to remove ('all' to remove all groups)
     * - groups: multiple groups (comma-separated, optional)
     *
     * @param array $params Parameters for vehicle/removevehiclegroup API.
     * @return Result The result of the vehicle/removevehiclegroup API.
     */
    public function removeVehicleGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removevehiclegroup', $params);
    }

    /**
     * Runtime information on vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: the vehicle name
     * - date: return runtime data for this date (optional)
     * - start: start of a date span (optional)
     * - end: end date for a date span (optional)
     *
     * @param array $params Parameters for vehicle/runtime API.
     * @return Result The result of the vehicle/runtime API.
     */
    public function runtime(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'runtime', $params);
    }

    /**
     * Return Service History report information for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for vehicle/servicehistory API.
     * @return Result The result of the vehicle/servicehistory API.
     */
    public function serviceHistory(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'servicehistory', $params);
    }

    /**
     * Add or update a vehicle attribute.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id, vin, serial_number, name or partial name (first to match) of current vehicle
     * - key: Attribute key ID or name
     * - value: Value matching the key type and style
     *
     * @param array $params Parameters for vehicle/setattribute API.
     * @return Result The result of the vehicle/setattribute API.
     */
    public function setAttribute(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setattribute', $params);
    }

    /**
     * Add or update an attribute key for vehicles timezone) attribute values.
     *
     * Valid parameters:
     *
     * - key: (optional) ID or name of an existing key
     * - name: Name of new key or same/updated name of existing key
     * - data_type: Allowed data type (date, date+time, integer, decimal, alphanumeric, emails, alerts,
     * - input_type: (optional) text (default), radio, or checkbox
     * - categories: (required for radio and checkbox input_type) Comma-separated list of allowed
     * - shared: (optional) 0=not shared (default), 1=shared with other users
     * - trip_style: (optional) 0=Permanent non-trip (default), 1=trip only, 2=stop only, 3=trip and stop
     *
     * @param array $params Parameters for vehicle/setattributekey API.
     * @return Result The result of the vehicle/setattributekey API.
     */
    public function setAttributeKey(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setattributekey', $params);
    }

    /**
     * Defines a new waypoint history element.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id, vin, serial_number, name or partial name (first to match)
     * - odometer: in miles
     * - timestamp: the time at which to place the new entry (optional)
     *
     * @param array $params Parameters for vehicle/setodometerwaypoint API.
     * @return Result The result of the vehicle/setodometerwaypoint API.
     */
    public function setOdometerWaypoint(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setodometerwaypoint', $params);
    }

    /**
     * Specify the full list of vehicle groups for this vehicle. All groups will be reset.
     *
     * Valid parameters:
     *
     * - groups: a comma-separated list of vehicle groups
     * - user: the vehicle to assign
     *
     * @param array $params Parameters for vehicle/setvehiclegroups API.
     * @return Result The result of the vehicle/setvehiclegroups API.
     */
    public function setVehicleGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setvehiclegroups', $params);
    }

    /**
     * Return State Mileage report information for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - start: Start date including hours and minutes if desired (optional - defaults to today)
     * - end: End date including hours and minutes if desired (optional - defaults to end of today)
     *
     * @param array $params Parameters for vehicle/statemileage API.
     * @return Result The result of the vehicle/statemileage API.
     */
    public function stateMileage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'statemileage', $params);
    }

    /**
     * Transfer a device from one vehicle to another.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id, vin, serial_number, name or partial name (first to match) of current vehicle
     * - label: Description of the new vehicle
     * - vin: VIN of the new vehicle
     * - color: (optional)
     * - country: (optional)
     * - fuel_capacity: (optional) In gallons
     * - fuel_type: (optional) U=Unleaded, D=Diesel, N=N/A
     * - license_number: (optional)
     * - license_state: (optional)
     * - make: (optional)
     * - model: (optional)
     * - model_year: (optional)
     * - odometer: (optional) In miles
     * - runtime_base: (optional) - the starting run_time total in hours
     * - engine_size: (optional) In liters
     * - idle_gph: (optional) Idle gallons per hour used
     *
     * @param array $params Parameters for vehicle/transfer API.
     * @return Result The result of the vehicle/transfer API.
     */
    public function transfer(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'transfer', $params);
    }

    /**
     * Return details about trips and stops for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - date: return runtime data for this date (optional)
     * - start: start of a date span (optional)
     * - end: end date for a date span (optional)
     *
     * @param array $params Parameters for vehicle/tripdetail API.
     * @return Result The result of the vehicle/tripdetail API.
     */
    public function tripDetail(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'tripdetail', $params);
    }

    /**
     * Update a vehicle's properties.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id, vin, serial_number, name or partial name (first to match)
     * - vin: (optional)
     * - color: (optional)
     * - country: (optional)
     * - fuel_capacity: (optional) In gallons
     * - fuel_type: (optional) U=Unleaded, D=Diesel, N=N/A
     * - label: (optional) Label assigned to the vehicle
     * - license_number: (optional)
     * - license_state: (optional)
     * - make: (optional)
     * - model: (optional)
     * - model_year: (optional)
     * - odometer: (optional) In miles
     * - timestamp: (optional) timestamp to apply to odometer waypoint
     * - runtime: (optional) In hours
     * - ref_id: External reference ID for the vehicle (does not display in interface)
     * - engine_size: (optional) In liters
     * - idle_gph: (optional) Idle gallons per hour used
     * - icon: id group id, label, style or partial label or style (optional, first to match)
     *
     * @param array $params Parameters for vehicle/update API.
     * @return Result The result of the vehicle/update API.
     */
    public function update(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'update', $params);
    }

    /**
     * Update a maintenance alert for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id of vehicle
     * - maint_alert_id
     * - maint_label
     * - value_offset: (optional)
     * - offset_hrs: (optional)
     * - next_svc_value: (optional)
     * - next_svc_hrs: (optional)
     * - next_svc_date: (optional)
     *
     * @param array $params Parameters for vehicle/updatemaintenancealert API.
     * @return Result The result of the vehicle/updatemaintenancealert API.
     */
    public function updateMaintenanceAlert(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'updatemaintenancealert', $params);
    }

    /**
     * Trigger in cab notification.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle id of vehicle
     * - output_id
     *
     * @param array $params Parameters for vehicle/triggerincabnotification API.
     * @return Result The result of the vehicle/triggerincabnotification API.
     */
    public function triggerInCabNotification(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'triggerincabnotification', $params);
    }
}
