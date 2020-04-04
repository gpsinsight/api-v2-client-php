<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to VehicleReports.
 */
class VehicleReport extends ServiceClient
{
    const SERVICE = 'vehiclereport';

    /**
     * Get a vehicle count summary by landmarks.
     *
     * Valid parameters:
     *
     * - group
     * - landmark_group
     * - rows
     * - sort: (optional)
     *
     * @param array $params Parameters for vehiclereport/atlandmarksummary API.
     * @return Result The result of the vehiclereport/atlandmarksummary API.
     */
    public function atLandmarkSummary(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'atlandmarksummary', $params);
    }

    /**
     * Retrieve a list of vehicles closest to a designated Address.
     *
     * Valid parameters:
     *
     * - address
     * - group: (optional)
     * - tree: (optional)
     * - node: (optional)
     * - radius: (optional)
     * - sort: (optional)
     * - vin: (optional)
     *
     * @param array $params Parameters for vehiclereport/closesttoaddress API.
     * @return Result The result of the vehiclereport/closesttoaddress API.
     */
    public function closestToAddress(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'closesttoaddress', $params);
    }

    /**
     * Retrieve a list of vehicles closest to a designated Landmark.
     *
     * Valid parameters:
     *
     * - landmark
     * - group: (optional)
     * - tree: (optional)
     * - node: (optional)
     * - radius: (optional)
     * - sort: (optional)
     *
     * @param array $params Parameters for vehiclereport/closesttolandmark API.
     * @return Result The result of the vehiclereport/closesttolandmark API.
     */
    public function closestToLandmark(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'closesttolandmark', $params);
    }

    /**
     * Retrieve a list of vehicles closest to a designated Lat/Lngroadside_allstate.
     *
     * Valid parameters:
     *
     * - latitude
     * - longitude
     * - group: (optional)
     * - tree: (optional)
     * - node: (optional)
     * - radius: (optional)
     * - sort: (optional)
     *
     * @param array $params Parameters for vehiclereport/closesttolatlng API.
     * @return Result The result of the vehiclereport/closesttolatlng API.
     */
    public function closestToLatLng(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'closesttolatlng', $params);
    }

    /**
     * Retrieve a list of vehicles closest to a designated Vehicle.
     *
     * Valid parameters:
     *
     * - vin
     * - group: (optional)
     * - tree: (optional)
     * - node: (optional)
     * - radius: (optional)
     * - sort: (optional)
     *
     * @param array $params Parameters for vehiclereport/closesttovin API.
     * @return Result The result of the vehiclereport/closesttovin API.
     */
    public function closestToVin(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'closesttovin', $params);
    }
}
