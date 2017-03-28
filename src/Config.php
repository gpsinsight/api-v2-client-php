<?php

namespace GpsInsight\Api\V2;

use GuzzleHttp\Command\HasDataTrait;
use GuzzleHttp\Command\ToArrayInterface;
use ArrayAccess;
use Countable;
use IteratorAggregate;

/**
 * Configuration object for the GPS Insight client library.
 *
 * This object is a simple, array-accessible object for storing and retrieving
 * configuration values for the library. It also contains constants for every
 * possible config value that are used for consistency throughout the code.
 */
class Config implements ArrayAccess, Countable, IteratorAggregate, ToArrayInterface
{
    use HasDataTrait;

    const APP_TOKEN = 'app_token';
    const CHANNEL = 'channel';
    const ENDPOINT = 'endpoint';
    const HTTP_HANDLER = 'http_handler';
    const HTTP_OPTIONS = 'http_options';
    const PASSWORD = 'password';
    const SESSION_TOKEN = 'session_token';
    const TOKEN_CACHE = 'token_cache';
    const USERNAME = 'username';
    const VERSION = 'version';
    const WIRE_LOG = 'wire_log';

    /** @var array The default options */
    private static $defaults = [
        self::ENDPOINT => 'https://api.gpsinsight.com',
        self::HTTP_OPTIONS => [],
    ];

    /**
     * Create a configuration object by combining provided values with defaults.
     *
     * @param array $data associative array of configuration values.
     */
    public function __construct(array $data = [])
    {
        $this->data = $data + self::$defaults;
    }
}
