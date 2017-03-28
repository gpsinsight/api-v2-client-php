<?php

namespace GpsInsight\Api\V2;

use GuzzleHttp;

/**
 * Entry point object to interact with the GPS Insight API.
 *
 * @property-read ServiceClient\Alert $alert
 * @property-read ServiceClient\ApiApp $apiapp
 * @property-read ServiceClient\Channel $channel
 * @property-read ServiceClient\CustomerSite $customersite
 * @property-read ServiceClient\Device $device
 * @property-read ServiceClient\Dispatch $dispatch
 * @property-read ServiceClient\Driver $driver
 * @property-read ServiceClient\DriverGroup $drivergroup
 * @property-read ServiceClient\FuelCard $fuelcard
 * @property-read ServiceClient\Garmin $garmin
 * @property-read ServiceClient\Geocode $geocode
 * @property-read ServiceClient\Heartbeat $heartbeat
 * @property-read ServiceClient\Hierarchy $hierarchy
 * @property-read ServiceClient\HierarchyNode $hierarchynode
 * @property-read ServiceClient\Landmark $landmark
 * @property-read ServiceClient\LandmarkGroup $landmarkgroup
 * @property-read ServiceClient\Route $route
 * @property-read ServiceClient\StopNote $stopnote
 * @property-read ServiceClient\SmsMessaging $smsmessaging
 * @property-read ServiceClient\User $user
 * @property-read ServiceClient\UserAuth $userauth
 * @property-read ServiceClient\Vehicle $vehicle
 * @property-read ServiceClient\VehicleGroup $vehiclegroup
 * @property-read ServiceClient\VehicleReport $vehiclereport
 * @property-read ServiceClient\VIN $vin
 * @property-read ServiceClient\Webhook $webhook
 */
class GpsInsight
{
    const VERSION = '0.1.0';

    /** @var Config */
    private $config;

    /** @var Factory */
    private $factory;

    /** @var Client */
    private $client;

    /** @var array */
    private $services;

    /**
     * Create an instance of the GPS Insight API Client Library.
     *
     * In order to have access to the API, you should provide your "username"
     * and one of the following: your "password", an "app_token", or a
     * "session_token" (if you've already authenticated).
     *
     * The following configuration options are valid:
     *
     *  - **app_token**: GPS Insight API "app token" (`string`, conditionally required)
     *  - **channel**: An identifier to tag your requests with for your application (`string`, recommended)
     *  - **endpoint**: GPS Insight API endpoint URL, if not the default (`string`, optional)
     *  - **http_handler**: Custom or shared Guzzle HTTP handler (`callable`, optional)
     *  - **http_options**: Associative array of Guzzle HTTP options (`array`, optional)
     *  - **password**: GPS Insight API account password (`string`, conditionally required)
     *  - **session_token**: GPS Insight API "session token" (`string`, conditionally required)
     *  - **token_cache**: A token cache for storing/retrieving session tokens (`TokenCacheInterface`, recommended)
     *  - **username**: GPS Insight API account username (`string`, required)
     *  - **version**: A version number to tag your requests with for your application (`string`, recommended)
     *  - **wire_log**: Used to enable wire logging for debugging purposes (`bool|LoggerInterface`, optional)
     *
     * @param array $config Associative array of configuration options
     */
    public function __construct(array $config = [])
    {
        $this->config = new Config($config);
        $this->factory = $this->config['factory'] ?: new Factory($this->config);
        $this->client = $this->factory->createClient();
        $this->services = [];
    }

    /**
     * Call an operation in the GPS Insight API.
     *
     * Delegates the call to the actual client object.
     *
     * @param string $service Name of the class/service being called.
     * @param string $method Name of the method/operation being called.
     * @param array $params Parameters for the API being called.
     * @return Result
     */
    public function call($service, $method, array $params = [])
    {
        return $this->client->call($service, $method, $params);
    }

    /**
     * Get the client object.
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get the library configuration.
     *
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param string $name Name of the class/service.
     * @return ServiceClient
     */
    public function __get($name)
    {
        $name = strtolower($name);
        if (!isset($this->services[$name])) {
            $this->services[$name] = $this->factory->createServiceClient($name, $this->client);
        }

        return $this->services[$name];
    }
}
