<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to FuelCards.
 */
class FuelCard extends ServiceClient
{
    const SERVICE = 'fuelcard';

    /**
     * List fuel cards that are not linked to a vehicle.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for fuelcard/listunassigned API.
     * @return Result The result of the fuelcard/listunassigned API.
     */
    public function listUnassigned(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listunassigned', $params);
    }

    /**
     * List vehicles that are not linked to a fuel card.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for fuelcard/listunassignedvehicles API.
     * @return Result The result of the fuelcard/listunassignedvehicles API.
     */
    public function listUnassignedVehicles(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listunassignedvehicles', $params);
    }

    /**
     * Fleetcor customers can manually match a Fleetcor card to a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - card_id: card identifier (see listunassigned)
     *
     * @param array $params Parameters for fuelcard/assignfleetcorcard API.
     * @return Result The result of the fuelcard/assignfleetcorcard API.
     */
    public function assignFleetcorCard(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'assignfleetcorcard', $params);
    }

    /**
     * Voyager customers can manually match a Voyager card to a vehicle.
     *
     * Valid parameters:
     *
     * - vehicle: vehicle vin, serial_number, name or partial name (first to match)
     * - card_id: card identifier (see listunassigned)
     *
     * @param array $params Parameters for fuelcard/assignvoyagercard API.
     * @return Result The result of the fuelcard/assignvoyagercard API.
     */
    public function assignVoyagerCard(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'assignvoyagercard', $params);
    }
}
