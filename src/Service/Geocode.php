<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Geocodes.
 */
class Geocode extends ServiceClient
{
    const SERVICE = 'geocode';

    /**
     * Geocode from an address.
     *
     * Valid parameters:
     *
     * - address
     *
     * @param array $params Parameters for geocode/address API.
     * @return Result The result of the geocode/address API.
     */
    public function address(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'address', $params);
    }

    /**
     * Mapbook request from address or location (limited availability).
     *
     * Valid parameters:
     *
     * - latitude
     * - longitude
     * - address: street address you want to locate
     *
     * @param array $params Parameters for geocode/mapbook API.
     * @return Result The result of the geocode/mapbook API.
     */
    public function mapbook(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'mapbook', $params);
    }

    /**
     * Reverse geocode an address from a latitude and longitude.
     *
     * Valid parameters:
     *
     * - latitude
     * - longitude
     * - heading: (optional)
     *
     * @param array $params Parameters for geocode/reverse API.
     * @return Result The result of the geocode/reverse API.
     */
    public function reverse(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'reverse', $params);
    }

    /**
     * Geocode a point into a specific timezone.
     *
     * Valid parameters:
     *
     * - latitude
     * - longitude
     *
     * @param array $params Parameters for geocode/timezone API.
     * @return Result The result of the geocode/timezone API.
     */
    public function timezone(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'timezone', $params);
    }

    /**
     * Geocode a set of points into specific timezones
     * &points[0][0]=33.333&points[0][1]=-100.000&points[1][0]=34.444&points[1][1]=-111.111.
     *
     * Valid parameters:
     *
     * - points: URL encoded, ex:
     *
     * @param array $params Parameters for geocode/timezones API.
     * @return Result The result of the geocode/timezones API.
     */
    public function timezones(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'timezones', $params);
    }
}
