<?php
namespace GpsInsight\Api\V2\Middleware;

use GpsInsight\Api\V2\Config;
use GpsInsight\Api\V2\Exception\AuthException;
use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\TokenCache\NullCache;
use GpsInsight\Api\V2\TokenCache\TokenCacheInterface as TokenCache;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Middleware that applies credentials provided in the config or command parameters.
 */
class Auth
{
    const MIDDLEWARE_NAME = 'auth';
    const LOGIN_OPERATION = 'userauth/login';

    /** @var callable Next handler in the middleware chain. */
    private $nextHandler;

    /** @var Config Config data containing credentials. */
    private $config;

    /** @var TokenCache */
    private $tokenCache;

    /**
     * Creates a chained handler that uses the Auth middleware.
     *
     * @param Config $config Config data containing credentials.
     * @param TokenCache $tokenCache
     * @return callable
     */
    public static function create(Config $config, TokenCache $tokenCache = null)
    {
        $tokenCache = $tokenCache ?: new NullCache();

        return function (callable $handler) use ($config, $tokenCache) {
            return new self($config, $tokenCache, $handler);
        };
    }

    /**
     * Create an instance of the Auth Middleware
     *
     * @param Config $config Config data containing credentials.
     * @param TokenCache $tokenCache
     * @param callable $nextHandler Next handler in the middleware chain.
     */
    public function __construct(
        Config $config,
        TokenCache $tokenCache,
        callable $nextHandler
    ) {
        $this->config = $config;
        $this->tokenCache = $tokenCache;
        $this->nextHandler = $nextHandler;
    }

    /**
     * @param CommandInterface $command Command to be executed.
     *
     * @return PromiseInterface
     */
    public function __invoke(CommandInterface $command)
    {
        return ($command->getName() === self::LOGIN_OPERATION)
            ? $this->executeLoginCommand($command)
            : $this->executeAuthenticatedCommand($command);
    }

    private function executeLoginCommand(CommandInterface $command)
    {
        return Promise\coroutine(function () use ($command) {
            // Login operation requires username.
            if (!$this->hasCredential($command, Config::USERNAME)) {
                throw AuthException::usernameRequired();
            }

            // Session token should not be provided.
            unset($command[Config::SESSION_TOKEN]);

            // Login operation requires app_token or password.
            if ($this->hasCredential($command, Config::APP_TOKEN)) {
                // Password should not be provided if app_token is.
                unset($command[Config::PASSWORD]);
            } elseif (!$this->hasCredential($command, Config::PASSWORD)) {
                throw AuthException::passwordOrAppTokenRequired();
            }

            // Execute the login operation and cache the resulting token.
            $result = (yield $this->handleCommand($command));
            $this->tokenCache->setToken($this->getCacheKey(), $result['token']);

            // Yield the result of the operation.
            yield $result;
        });
    }

    private function executeAuthenticatedCommand(CommandInterface $command)
    {
        return Promise\coroutine(function () use ($command) {
            // Login operation requires username.
            if (!$this->hasCredential($command, Config::USERNAME)) {
                throw AuthException::usernameRequired();
            }

            // If session_token not present in command or config, check the cache and perform a login, if necessary.
            if (!$this->hasCredential($command, Config::SESSION_TOKEN)) {
                $command[Config::SESSION_TOKEN] = (yield $this->getSessionToken());
            }

            // Execute the operation.
            /** @var Result $result */
            $result = (yield $this->handleCommand($command));

            // If there was an auth error (e.g., token expired), re-authenticate and retry the operation.
            if (!$result->isOk()) {
                $command[Config::SESSION_TOKEN] = (yield $this->getSessionToken(true));
                $result = (yield $this->handleCommand($command));
            }

            // Yield the result of the operation.
            yield $result;
        });
    }

    private function getSessionToken($refresh = false)
    {
        return Promise\coroutine(function () use ($refresh) {
            $token = $this->tokenCache->getToken($this->getCacheKey());
            if ($token && !$refresh) {
                yield Promise\promise_for($token);
            } else {
                $result = (yield $this(new Command(self::LOGIN_OPERATION)));
                if (!$result['token']) {
                    throw AuthException::sessionTokenMissing();
                }

                yield $result['token'];
            }
        })->then(function ($token) {
            return $this->config[Config::SESSION_TOKEN] = $token;
        });
    }

    private function hasCredential(CommandInterface $command, $name)
    {
        if (!$command[$name]) {
            if (!$this->config[$name]) {
                return false;
            }

            $command[$name] = $this->config[$name];
        }

        return true;
    }

    /**
     * @param CommandInterface $command
     * @return PromiseInterface
     */
    private function handleCommand(CommandInterface $command)
    {
        /** @var callable $handler */
        $handle = $this->nextHandler;

        return $handle($command);
    }

    /**
     * @return string
     */
    private function getCacheKey()
    {
        return md5($this->config[Config::USERNAME] . $this->config[Config::APP_TOKEN]);
    }
}
