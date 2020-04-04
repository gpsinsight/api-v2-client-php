<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to StopNotes.
 */
class StopNote extends ServiceClient
{
    const SERVICE = 'stopnote';

    /**
     * Adds a stop note for a vehicle at a particular point in time. Supports a note, url, or note/url combination.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle identifier (vin or label or serial number)
     * - date: Date the note was added (optional - defaults to now)
     * - note: Text description of the note
     * - source: External note source type ('phone', 'garmin', 'email', etc) - (optional)
     * - source_id: External identifier (phone number, Garmin serial number, email address, etc) (optional)
     * - url: URL for the optional link on the note. Should be a link to an external resource.
     *
     * @param array $params Parameters for stopnote/create API.
     * @return Result The result of the stopnote/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * List all stop notes within a date range for a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: Vehicle identifier (vin or label or serial number)
     * - start
     * - end
     *
     * @param array $params Parameters for stopnote/list API.
     * @return Result The result of the stopnote/list API.
     */
    public function listStopNotes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }
}
