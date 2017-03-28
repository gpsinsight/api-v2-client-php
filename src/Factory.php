<?php

namespace GpsInsight\Api\V2;

use GpsInsight\Api\V2\Exception\InstantiationException;
use GpsInsight\Api\V2\Middleware\Auth as AuthMiddleware;
use GpsInsight\Api\V2\Middleware\Channel as ChannelMiddleware;
use GpsInsight\Api\V2\Middleware\WireLog;
use GpsInsight\Api\V2\TokenCache\NullCache;
use GpsInsight\Api\V2\TokenCache\TokenCacheInterface;
use GuzzleHttp;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware as HttpMiddleware;
use Psr\Log\LoggerInterface;

/**
 * Factory is an internal-only class used to encapsulate the instantiation logic
 * for various components within the GPS Insight API Client Library.
 *
 * @internal
 */
class Factory
{
    /** @var Config Configuration for the GPS Insight API Client Library. */
    private $config;

    /**
     * @param Config $config Configurations
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Create a Client.
     *
     * @return Client
     */
    public function createClient()
    {
        $client = new Client($this->createHttpClient());

        // Add middleware to handle inserting authentication parameters.
        $client->getHandlerStack()->push(
            AuthMiddleware::create($this->config, $this->createTokenCache()),
            AuthMiddleware::MIDDLEWARE_NAME
        );

        // Add middleware to handle insert channel parameters.
        if ($this->config[Config::CHANNEL] || $this->config[Config::VERSION]) {
            $client->getHandlerStack()->push(
                ChannelMiddleware::create($this->config),
                ChannelMiddleware::MIDDLEWARE_NAME
            );
        }

        return $client;
    }

    /**
     * Create a Guzzle HTTP client.
     *
     * @return HttpClient
     */
    public function createHttpClient()
    {
        return new HttpClient([
            'allow_redirects' => false,
            'base_uri' => $this->config['endpoint'],
            'cookies' => false,
            'expect' => false,
            'handler' => $this->createHttpHandlerStack(),
            'http_errors' => false,
        ] + $this->config['http_options']);
    }

    /**
     * Create a handler stack for Request/Response middleware with a
     * configurable http handler.
     *
     * @return HandlerStack
     */
    public function createHttpHandlerStack()
    {
        $stack = new HandlerStack($this->config['http_handler']
            ?: GuzzleHttp\choose_handler());

        // Add an HTTP middleware for wire logging if enabled.
        if ($this->config[Config::WIRE_LOG]) {
            $stack->push($this->createWireLog(), WireLog::MIDDLEWARE_NAME);
        }

        return $stack;
    }

    /**
     * Create a service-specific client with generated methods for auto-complete.
     *
     * @param string $name
     * @param Client $client
     * @return ServiceClient
     */
    public function createServiceClient($name, Client $client)
    {
        $validServices = Services::all();

        if (!isset($validServices[$name])) {
            throw new InstantiationException("There is no service named {$name}.");
        }
        $class = __NAMESPACE__ . '\\Service\\' . $validServices[$name];

        return new $class($client);
    }

    /**
     * Create a token cache for persisting sessions tokens.
     *
     * @return TokenCacheInterface
     */
    public function createTokenCache()
    {
        $cache = $this->config[Config::TOKEN_CACHE];
        if (!$cache) {
            $cache = new NullCache();
        }

        if (!$cache instanceof TokenCacheInterface) {
            throw new InstantiationException("Invalid token cache.");
        }

        return $cache;
    }

    /**
     * Creates a logging middleware using a PSR-3 compliant logger object.
     *
     * @return callable
     */
    public function createWireLog()
    {
        $log = $this->config['wire_log'];

        return HttpMiddleware::log(
            $log instanceof LoggerInterface ? $log : new WireLog(STDOUT),
            new MessageFormatter(WireLog::getFormat())
        );
    }
}
