<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Alerts.
 */
class Alert extends ServiceClient
{
    const SERVICE = 'alert';

    /**
     * Return list of alerts available for the api user logged in.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for alert/availablealerts API.
     * @return Result The result of the alert/availablealerts API.
     */
    public function availableAlerts(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'availablealerts', $params);
    }

    /**
     * Delete Alert.
     *
     * Valid parameters:
     *
     * - alert_id: Alert ID (watcher_id)
     *
     * @param array $params Parameters for alert/delete API.
     * @return Result The result of the alert/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Get alert history by group.
     *
     * Valid parameters:
     *
     * - alert_minutes_age: Query a duration in minutes (optional)
     * - start: Start of a range of dates to query (optional)
     * - end: End of a range of dates to query (optional)
     * - date: A single date to query (optional)
     * - vehicle_group: (optional)
     * - vehicle: (optional)
     * - alert: An alert_id to filter (or "all")
     *
     * @param array $params Parameters for alert/history API.
     * @return Result The result of the alert/history API.
     */
    public function history(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'history', $params);
    }

    /**
     * List defined alerts.
     *
     * Valid parameters:
     *
     * - alert: alert_id to filter (or "all", optional)
     * - date: date in the past for since-deleted alerts (optional)
     *
     * @param array $params Parameters for alert/list API.
     * @return Result The result of the alert/list API.
     */
    public function listAlerts(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Creates a new 'ignition' alert (optional) as addresses param; omit for ALL DEPTHS (optional) default `in`
     * (optional) driver/app) (optional) 'mon,tue,wed,thu,fri' (optional) 'sat,sun' (optional).
     *
     * Valid parameters:
     *
     * - addresses: comma-delimited list of email addresses/SMS numbers OR the name of a Custom Attribute
     * - alert_depth: comma-delimited list of alert level depths to alert if providing Custom Attribute
     * - vehicle: Set alert on specific vehicle (optional)
     * - vehicle_group: Set alert on vehicle group (optional)
     * - tree: Set alert on vehicles belonging to a hierarchy (optional)
     * - node: Set alert on vehicles belonging to a hierarchy (optional)
     * - description: Description of alert (optional)
     * - ignition_status: Which status to alert on (on | off | both) default 'both' (optional)
     * - in_cab: Which `in cab` output to activate on alert (optional)
     * - in_cab_value: Modifier for `in cab` output (e.g. number of Pulses) (optional)
     * - landmark: Landmark context of alert (optional)
     * - landmark_group: Landmark group context of alert (optional)
     * - landmark_proximity: When to alert within the context of the provided landmark default (in | out)
     * - alert_driver: Alert driver of vehicle (0 = off, 1 = notify driver, 2 = notify app, 3 notify
     * - alert_driver_msg: Message to send to driver (optional)
     * - active: Set active status of new alert default 1 (optional)
     * - one_time: Set to `1` if you wish alert to not repeat (optional)
     * - repeat_delay: delay between alert invocations default 5m (optional)
     * - per_vehicle_delay: delay between alert invocations per vehicle default 5m (optional)
     * - week_days: comma-delimited list of days of the week to be considered 'week days' default
     * - weekend_days: comma-delimited list of days of the week to be considered the 'weekend' default
     * - weekday_hour_start: Hour to enable alerts during weekdays (optional)
     * - weekday_hour_end: Hour to disable alerts during weekdays (optional)
     * - weekend_hour_start: Hour to enable alerts during weekends (optional)
     * - weekend_hour_end: Hour to disable alerts during weekdays (optional)
     *
     * @param array $params Parameters for alert/createignition API.
     * @return Result The result of the alert/createignition API.
     */
    public function createIgnition(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'createignition', $params);
    }

    /**
     * Creates a new Towing alert (optional) as addresses param; omit for ALL DEPTHS (optional) default `in` (optional)
     * driver/app) (optional) 'mon,tue,wed,thu,fri' (optional) 'sat,sun' (optional).
     *
     * Valid parameters:
     *
     * - addresses: comma-delimited list of email addresses/SMS numbers OR the name of a Custom Attribute
     * - alert_depth: comma-delimited list of alert level depths to alert if providing Custom Attribute
     * - vehicle: Set alert on specific vehicle (optional)
     * - vehicle_group: Set alert on vehicle group (optional)
     * - tree: Set alert on vehicles belonging to a hierarchy (optional)
     * - node: Set alert on vehicles belonging to a hierarchy (optional)
     * - description: Name of alert (optional)
     * - in_cab: Which `in cab` output to activate on alert (optional)
     * - in_cab_value: Modifier for `in cab` output (e.g. number of Pulses) (optional)
     * - switch_type: Which switch to alert on
     * - landmark: Landmark context of alert (optional)
     * - landmark_group: Landmark group context of alert (optional)
     * - landmark_proximity: When to alert within the context of the provided landmark default (in | out)
     * - alert_driver: Alert driver of vehicle (0 = off, 1 = notify driver, 2 = notify app, 3 notify
     * - alert_driver_msg: Message to send to driver (optional)
     * - active: Set active status of new alert default 1 (optional)
     * - one_time: Set to `1` if you wish alert to not repeat (optional)
     * - repeat_delay: delay between alert invocations default 5m (optional)
     * - per_vehicle_delay: delay between alert invocations per vehicle default 5m (optional)
     * - week_days: comma-delimited list of days of the week to be considered 'week days' default
     * - weekend_days: comma-delimited list of days of the week to be considered the 'weekend' default
     * - weekday_hour_start: Hour to enable alerts during weekdays (optional)
     * - weekday_hour_end: Hour to disable alerts during weekdays (optional)
     * - weekend_hour_start: Hour to enable alerts during weekends (optional)
     * - weekend_hour_end: Hour to disable alerts during weekdays (optional)
     *
     * @param array $params Parameters for alert/createtowing API.
     * @return Result The result of the alert/createtowing API.
     */
    public function createTowing(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'createtowing', $params);
    }

    /**
     * List a single alert.
     *
     * Valid parameters:
     *
     * - alert: an alert id
     *
     * @param array $params Parameters for alert/read API.
     * @return Result The result of the alert/read API.
     */
    public function read(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'read', $params);
    }

    /**
     * Updates a Driver Assignment alert (optional) as addresses param; omit for ALL DEPTHS (optional) default `in`
     * (optional) driver/app) (optional) 'mon,tue,wed,thu,fri' (optional) 'sat,sun' (optional).
     *
     * Valid parameters:
     *
     * - alert: Either the ID or name (partial OK) of the alert.
     * - addresses: comma-delimited list of email addresses/SMS numbers OR the name of a Custom Attribute
     * - alert_depth: comma-delimited list of alert level depths to alert if providing Custom Attribute
     * - vehicle: Set alert on specific vehicle (optional)
     * - vehicle_group: Set alert on vehicle group (optional)
     * - tree: Set alert on vehicles belonging to a hierarchy (optional)
     * - node: Set alert on vehicles belonging to a hierarchy (optional)
     * - description: Description of alert (optional)
     * - violation_limit: Which acceleration gravity (g) threshold to alert (eg: "0.25", "0.50", "0.75", etc) (optional)
     * - in_cab: Which `in cab` output to activate on alert (optional)
     * - in_cab_value: Modifier for `in cab` output (e.g. number of Pulses) (optional)
     * - landmark: Landmark context of alert (optional)
     * - landmark_group: Landmark group context of alert (optional)
     * - landmark_proximity: When to alert within the context of the provided landmark default (in | out)
     * - alert_driver: Alert driver of vehicle (0 = off, 1 = notify driver, 2 = notify app, 3 notify
     * - alert_driver_msg: Message to send to driver (optional)
     * - active: Set active status of new alert default 1 (optional)
     * - one_time: Set to `1` if you wish alert to not repeat (optional)
     * - repeat_delay: delay between alert invocations default 5m (optional)
     * - per_vehicle_delay: delay between alert invocations per vehicle default 5m (optional)
     * - week_days: comma-delimited list of days of the week to be considered 'week days' default
     * - weekend_days: comma-delimited list of days of the week to be considered the 'weekend' default
     * - weekday_hour_start: Hour to enable alerts during weekdays (optional)
     * - weekday_hour_end: Hour to disable alerts during weekdays (optional)
     * - weekend_hour_start: Hour to enable alerts during weekends (optional)
     * - weekend_hour_end: Hour to disable alerts during weekdays (optional)
     *
     * @param array $params Parameters for alert/updatedriverassign API.
     * @return Result The result of the alert/updatedriverassign API.
     */
    public function updateDriverAssign(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'updatedriverassign', $params);
    }

    /**
     * Updates a Towing alert (optional) as addresses param; omit for ALL DEPTHS (optional) default `in` (optional)
     * driver/app) (optional) 'mon,tue,wed,thu,fri' (optional) 'sat,sun' (optional).
     *
     * Valid parameters:
     *
     * - alert: Either the ID or name (partial OK) of the alert.
     * - addresses: comma-delimited list of email addresses/SMS numbers OR the name of a Custom Attribute
     * - alert_depth: comma-delimited list of alert level depths to alert if providing Custom Attribute
     * - vehicle: Set alert on specific vehicle (optional)
     * - vehicle_group: Set alert on vehicle group (optional)
     * - tree: Set alert on vehicles belonging to a hierarchy (optional)
     * - node: Set alert on vehicles belonging to a hierarchy (optional)
     * - description: Name of alert (optional)
     * - stop_type: Which activity to alert on (stop, idle or both) (optional)
     * - stop_limit: Minutes a vehicle must be stopped before an alert is triggered. (optional)
     * - in_cab: Which `in cab` output to activate on alert (optional)
     * - in_cab_value: Modifier for `in cab` output (e.g. number of Pulses) (optional)
     * - landmark: Landmark context of alert (optional)
     * - landmark_group: Landmark group context of alert (optional)
     * - landmark_proximity: When to alert within the context of the provided landmark default (in | out)
     * - alert_driver: Alert driver of vehicle (0 = off, 1 = notify driver, 2 = notify app, 3 notify
     * - alert_driver_msg: Message to send to driver (optional)
     * - active: Set active status of new alert default 1 (optional)
     * - repeat_delay: delay between alert invocations default 5m (optional)
     * - per_vehicle_delay: delay between alert invocations per vehicle default 5m (optional)
     * - week_days: comma-delimited list of days of the week to be considered 'week days' default
     * - weekend_days: comma-delimited list of days of the week to be considered the 'weekend' default
     * - weekday_hour_start: Hour to enable alerts during weekdays (optional)
     * - weekday_hour_end: Hour to disable alerts during weekdays (optional)
     * - weekend_hour_start: Hour to enable alerts during weekends (optional)
     * - weekend_hour_end: Hour to disable alerts during weekdays (optional)
     *
     * @param array $params Parameters for alert/updatetowing API.
     * @return Result The result of the alert/updatetowing API.
     */
    public function updateTowing(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'updatetowing', $params);
    }
}
