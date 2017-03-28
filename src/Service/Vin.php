<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Vins.
 */
class Vin extends ServiceClient
{
    const SERVICE = 'vin';

    /**
     * Decode a VIN and return all info from our decoder.
     *
     * Valid parameters:
     *
     * - vin
     *
     * @param array $params Parameters for vin/decode API.
     * @return Result The result of the vin/decode API.
     */
    public function decode(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'decode', $params);
    }

    /**
     * Decode a VIN to find make, model, model_year, engine_size.
     *
     * Valid parameters:
     *
     * - vin
     *
     * @param array $params Parameters for vin/basicinfo API.
     * @return Result The result of the vin/basicinfo API.
     */
    public function basicInfo(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'basicinfo', $params);
    }
}
