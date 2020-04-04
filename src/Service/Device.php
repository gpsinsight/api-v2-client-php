<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Devices.
 */
class Device extends ServiceClient
{
    const SERVICE = 'device';

    /**
     * Returns the diagnostic VIN for the input serial#.
     *
     * Valid parameters:
     *
     * - serial_number: Specific device serial number
     *
     * @param array $params Parameters for device/diagnosticvin API.
     * @return Result The result of the device/diagnosticvin API.
     */
    public function diagnosticVin(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'diagnosticvin', $params);
    }

    /**
     * List all devices for either this account or the account ID passed (if authorized to see it).
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for device/list API.
     * @return Result The result of the device/list API.
     */
    public function listDevices(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * List available (unused) devices assigned to your account.
     *
     * Valid parameters:
     *
     * - account_id: (optional) ID of the account to be listed
     *
     * @param array $params Parameters for device/listavailableserials API.
     * @return Result The result of the device/listavailableserials API.
     */
    public function listAvailableSerials(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listavailableserials', $params);
    }

    /**
     * .
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for device/partnumbers API.
     * @return Result The result of the device/partnumbers API.
     */
    public function partNumbers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'partnumbers', $params);
    }

    /**
     * Sources and Types are used somewhat interchangeably.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for device/sources API.
     * @return Result The result of the device/sources API.
     */
    public function sources(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'sources', $params);
    }

    /**
     * .
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for device/status API.
     * @return Result The result of the device/status API.
     */
    public function status(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'status', $params);
    }
}
