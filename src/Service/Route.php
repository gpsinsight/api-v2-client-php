<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Routes.
 */
class Route extends ServiceClient
{
    const SERVICE = 'route';

    /**
     * Delete a saved route.
     *
     * Valid parameters:
     *
     * - route: Route identifier (id or label)
     *
     * @param array $params Parameters for route/delete API.
     * @return Result The result of the route/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Returns driving directions between an ordered set of stops. Stops can be passed either in a JSON-encoded array
     * directly or from an existing route definition.
     *
     * Valid parameters:
     *
     * - route: (optional) Route identifier (id or label)
     * - stops_json: (optional) stops portion of a JSON-encoded route (see notes for format)
     *
     * @param array $params Parameters for route/directions API.
     * @return Result The result of the route/directions API.
     */
    public function directions(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'directions', $params);
    }

    /**
     * Display all saved routes for this account or a particular one.
     *
     * Valid parameters:
     *
     * - route: (optional) Route identifier (id or label)
     *
     * @param array $params Parameters for route/list API.
     * @return Result The result of the route/list API.
     */
    public function listRoutes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Returns a google mapslink for the given set of stops or stored routeroute It can be passed either a route
     * identifier or a set of JSON-encoded stops.
     *
     * Valid parameters:
     *
     * - route: (optional) Route identifier (id or label)
     * - stops_json: (optional) stops portion of a JSON-encoded route (see notes for format)
     *
     * @param array $params Parameters for route/mapslink API.
     * @return Result The result of the route/mapslink API.
     */
    public function mapsLink(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'mapslink', $params);
    }

    /**
     * Returns an optimized ordered set of stops for the given JSON or stored route It can be passed either a route
     * identifier or a set of JSON-encoded stops.
     *
     * Valid parameters:
     *
     * - route: (optional) Route identifier (id or label)
     * - route_json: (optional) JSON-encoded array of route data (see notes for format)
     *
     * @param array $params Parameters for route/optimize API.
     * @return Result The result of the route/optimize API.
     */
    public function optimize(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'optimize', $params);
    }

    /**
     * Add or update a route.
     *
     * Valid parameters:
     *
     * - route: (update only) Route identifier (id or label)
     * - label: Name of the route (will update if existing route found)
     * - route_json: JSON-encoded array of route data (see notes for format)
     *
     * @param array $params Parameters for route/save API.
     * @return Result The result of the route/save API.
     */
    public function save(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'save', $params);
    }

    /**
     * Validate if JSON string is formatted correctly.
     *
     * Valid parameters:
     *
     * - route_json: JSON-encoded array of route data (see notes for format)
     *
     * @param array $params Parameters for route/validate API.
     * @return Result The result of the route/validate API.
     */
    public function validate(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'validate', $params);
    }
}
