<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Webhooks.
 */
class Webhook extends ServiceClient
{
    const SERVICE = 'webhook';

    /**
     * Start a data service and register a callback script for us to post data to.
     *
     * Valid parameters:
     *
     * - url: URL of the endpoint to which we will write the data
     * - email: an email address to notify of changes to the status of the script
     * - name: a name to reference this webhook
     * - type: one of fourteen available webhook types (location, speed, posted, heartbeat, trip_complete, ignition_on, ignition_off, landmark_enter, landmark_leave, landmark_change, idle, diagnostic, dtc, dvir)
     * - content_type: the format of the data that is sent to you - must be either 'form' or 'json'
     * - batch: (optional) whether or not to batch webhook messages.
     *
     * @param array $params Parameters for webhook/create API.
     * @return Result The result of the webhook/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * Terminate a webhook and delete the configuration.
     *
     * Valid parameters:
     *
     * - id: the webhook id to delete
     *
     * @param array $params Parameters for webhook/delete API.
     * @return Result The result of the webhook/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * List all active webhoks for your user.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for webhook/list API.
     * @return Result The result of the webhook/list API.
     */
    public function listWebhooks(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Resume a paused webhook.
     *
     * Valid parameters:
     *
     * - id: the webhook id to resume
     *
     * @param array $params Parameters for webhook/resume API.
     * @return Result The result of the webhook/resume API.
     */
    public function resume(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'resume', $params);
    }

    /**
     * Pause a webhook.
     *
     * Valid parameters:
     *
     * - id: the webhook id to pause
     *
     * @param array $params Parameters for webhook/pause API.
     * @return Result The result of the webhook/pause API.
     */
    public function pause(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'pause', $params);
    }
}
