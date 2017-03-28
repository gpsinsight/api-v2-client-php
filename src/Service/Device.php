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
     * - account_id: (optional for customer context) ID of the account to be listed
     *
     * @param array $params Parameters for device/listavailableserials API.
     * @return Result The result of the device/listavailableserials API.
     */
    public function listAvailableSerials(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listavailableserials', $params);
    }

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
}
