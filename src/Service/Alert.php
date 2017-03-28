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
}
