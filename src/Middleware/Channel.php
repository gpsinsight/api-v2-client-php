<?php
namespace GpsInsight\Api\V2\Middleware;

use GpsInsight\Api\V2\Config;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Middleware that applies the provided app channel and version.
 */
class Channel
{
    const MIDDLEWARE_NAME = 'channel';
    const PARAM_CHANNEL = 'channel';
    const PARAM_VERSION = 'v';

    /** @var callable Next handler in the middleware chain. */
    private $nextHandler;

    /** @var Config Config data containing credentials. */
    private $config;

    /**
     * Creates a chained handler that uses the Channel middleware.
     *
     * @param Config $config Config data containing credentials.
     *
     * @return callable
     */
    public static function create(Config $config)
    {
        return function (callable $handler) use ($config) {
            return new self($config, $handler);
        };
    }

    /**
     * Create an instance of the Channel Middleware
     *
     * @param Config   $config      Config data containing configured channel.
     * @param callable $nextHandler Next handler in the middleware chain.
     */
    public function __construct(Config $config, callable $nextHandler)
    {
        $this->nextHandler = $nextHandler;
        $this->config = $config;
    }

    /**
     * @param CommandInterface $command Command to be executed.
     *
     * @return PromiseInterface
     */
    public function __invoke(CommandInterface $command)
    {
        $next = $this->nextHandler;

        // Add the channel and version (v) params from config, if not present.
        if (!$command[self::PARAM_CHANNEL] && $this->config[Config::CHANNEL]) {
            $command[self::PARAM_CHANNEL] = $this->config[Config::CHANNEL];
        }
        if (!$command[self::PARAM_VERSION] && $this->config[Config::VERSION]) {
            $command[self::PARAM_VERSION] = $this->config[Config::VERSION];
        }

        return $next($command);
    }
}
