<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Landmarks.
 */
class Landmark extends ServiceClient
{
    const SERVICE = 'landmark';

    /**
     * add a landmark to a group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     * - landmark: Landmark ID or full landmark name
     *
     * @param array $params Parameters for landmark/addlandmarkgroup API.
     * @return Result The result of the landmark/addlandmarkgroup API.
     */
    public function addLandmarkGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addlandmarkgroup', $params);
    }

    /**
     * Create a new landmark.
     *
     * Valid parameters:
     *
     * - landmark: Label
     * - latitude: Horizontal center of landmark
     * - longitude: Vertical center of landmark
     * - radius: radius (optional - defaults to 750)
     * - radius_units: 'F' = feet, 'M' = miles, 'T' = meters (optional, defaults to F)
     * - color: Hexidecimal color code (optional, defaults to 0000ff)
     *
     * @param array $params Parameters for landmark/create API.
     * @return Result The result of the landmark/create API.
     */
    public function create(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'create', $params);
    }

    /**
     * delete a landmark.
     *
     * Valid parameters:
     *
     * - landmark: Landmark ID or full landmark name
     *
     * @param array $params Parameters for landmark/delete API.
     * @return Result The result of the landmark/delete API.
     */
    public function delete(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'delete', $params);
    }

    /**
     * Get attributes for a landmark.
     *
     * Valid parameters:
     *
     * - landmark: Landmark ID or full landmark name
     * - key: (optional) attribute key
     *
     * @param array $params Parameters for landmark/getattributes API.
     * @return Result The result of the landmark/getattributes API.
     */
    public function getAttributes(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getattributes', $params);
    }

    /**
     * List all landmarks.
     *
     * Valid parameters:
     *
     * - landmark: Show by Landmark ID or full landmark name (optional)
     * - group: Show by landmark group by label or group ID (optional)
     * - detailed: show more detailed info [location, address] (optional when selecting a single landmark)
     * - tiny: show minimum landmark data
     *
     * @param array $params Parameters for landmark/list API.
     * @return Result The result of the landmark/list API.
     */
    public function listLandmarks(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * Read info for a single landmark.
     *
     * Valid parameters:
     *
     * - landmark
     *
     * @param array $params Parameters for landmark/read API.
     * @return Result The result of the landmark/read API.
     */
    public function read(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'read', $params);
    }

    /**
     * Remove a landmark attribute.
     *
     * Valid parameters:
     *
     * - id: Numeric identifier for the attribute value
     *
     * @param array $params Parameters for landmark/removeattribute API.
     * @return Result The result of the landmark/removeattribute API.
     */
    public function removeAttribute(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeattribute', $params);
    }

    /**
     * Remove a landmark attribute Key not (0-default).
     *
     * Valid parameters:
     *
     * - key: Attribute key to be deleted
     * - delete_if_empty: (optional) Delete the attribute from lists if no associated entities remain (1) or
     *
     * @param array $params Parameters for landmark/removeattributekey API.
     * @return Result The result of the landmark/removeattributekey API.
     */
    public function removeAttributeKey(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removeattributekey', $params);
    }

    /**
     * remove a landmark from a group.
     *
     * Valid parameters:
     *
     * - group: the landmark group name
     * - landmark: Landmark ID or full landmark name
     *
     * @param array $params Parameters for landmark/removelandmarkgroup API.
     * @return Result The result of the landmark/removelandmarkgroup API.
     */
    public function removeLandmarkGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removelandmarkgroup', $params);
    }

    /**
     * Add or update a landmark attribute.
     *
     * Valid parameters:
     *
     * - landmark: landmark ID or full landmark name
     * - key: Attribute key ID or name
     * - value: Value matching the key type and style
     *
     * @param array $params Parameters for landmark/setattribute API.
     * @return Result The result of the landmark/setattribute API.
     */
    public function setAttribute(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setattribute', $params);
    }

    /**
     * Add or update an attribute key for landmarks timezone) attribute values.
     *
     * Valid parameters:
     *
     * - key: (optional) ID or name of an existing key
     * - name: Name of new key or same/updated name of existing key
     * - data_type: Allowed data type (date, date+time, integer, decimal, alphanumeric, emails, alerts,
     * - input_type: (optional) text (default), radio, or checkbox
     * - categories: (required for radio and checkbox input_type) Comma-separated list of allowed
     * - shared: (optional) 0=not shared (default), 1=shared with other users
     * - trip_style: (optional) 0=Permanent non-trip (default), 1=trip only, 2=stop only, 3=trip and stop
     *
     * @param array $params Parameters for landmark/setattributekey API.
     * @return Result The result of the landmark/setattributekey API.
     */
    public function setAttributeKey(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'setattributekey', $params);
    }

    /**
     * update a landmark.
     *
     * Valid parameters:
     *
     * - landmark: label or landmark id
     * - latitude: coordinate center of landmark (optional)
     * - longitude: coordinate center of landmark (optional)
     * - radius: radius (optional)
     * - radius_units: 'F' = feet, 'M' = miles, 'T' = meters (optional)
     * - color: hexidecimal color code (optional)
     * - address: (optional)
     * - address_2: (optional)
     * - city: (optional)
     * - state: (optional)
     * - zip: (optional)
     * - country: (optional)
     *
     * @param array $params Parameters for landmark/update API.
     * @return Result The result of the landmark/update API.
     */
    public function update(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'update', $params);
    }

    /**
     * Clear cached sets of landmark data for your account (new landmark data will be generated from a database query).
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for landmark/clearcache API.
     * @return Result The result of the landmark/clearcache API.
     */
    public function clearCache(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'clearcache', $params);
    }
}
