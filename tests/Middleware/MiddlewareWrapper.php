<?php

namespace GpsInsight\Api\Test\V2\Middleware;

use GpsInsight\Api\V2\Result;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Promise;

/**
 * Wraps a middleware callable with some methods that make testing easier and more clear.
 */
class MiddlewareWrapper
{
    /** @var callable */
    private $middleware;

    /** @var bool */
    private $resolved;

    public function __construct(callable $middleware)
    {
        $this->middleware = $middleware;
        $this->resolved = false;
    }

    /**
     * Resolves the middleware with a handler that responds with the provided Result.
     *
     * @param Result $result
     */
    public function setResult(Result $result)
    {
        $this->middleware = call_user_func($this->middleware, function () use ($result) {
            return Promise\promise_for($result);
        });
        $this->resolved = true;
    }

    /**
     * Synchronously calls the middleware with the provided command and returns the result.
     *
     * @param CommandInterface $command
     * @return Result
     */
    public function handle(CommandInterface $command)
    {
        if (!$this->resolved) {
            $this->setResult(new Result(['head' => ['status' => Result::STATUS_OK]]));
        }

        return call_user_func($this->middleware, $command)->wait();
    }
}
