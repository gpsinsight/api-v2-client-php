<?php

namespace GpsInsight\Api\V2;

use GpsInsight\Api\V2\Exception\ApiCallException;
use GuzzleHttp;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\CommandInterface as Command;
use GuzzleHttp\Command\ServiceClient as GuzzleCommandClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * An RPC-style HTTP client for the GPS Insight API.
 *
 * This client extends the guzzlehttp/command package.
 */
class Client extends GuzzleCommandClient
{
    const USER_AGENT = 'gpsinsight-php-client';
    const API_VERSION = 'v2';

    /**
     * @param HttpClient $client Guzzle HTTP client for making the requests.
     */
    public function __construct(HttpClient $client)
    {
        parent::__construct(
            $client,
            $this->createRequestTransformer(),
            $this->createResponseTransformer()
        );
    }

    /**
     * Call an operation in the GPS Insight API.
     *
     * @param string $service Name of the class/service being called.
     * @param string $method Name of the method/operation being called.
     * @param array $params Parameters for the API being called.
     * @return Result
     * @throws ApiCallException on failure.
     */
    public function call($service, $method, array $params = [])
    {
        // Force synchronous communication.
        $params['@http']['synchronous'] = true;

        // Execute the API operation.
        return $this->callAsync($service, $method, $params)->wait();
    }

    /**
     * Call an operation in the GPS Insight API asynchronously.
     *
     * @param string $service Name of the class/service being called.
     * @param string $method Name of the method/operation being called.
     * @param array $params Parameters for the API being called.
     * @return PromiseInterface Resolves to a Result or ApiCallException.
     */
    public function callAsync($service, $method, array $params = [])
    {
        // Create a command representing the API operation.
        $command = $this->getCommand("{$service}/{$method}", $params);

        // Execute the API operation.
        return $this->executeAsync($command)->otherwise(function (\Exception $ex) use ($command) {
            throw ApiCallException::callFailed($command, $ex);
        });
    }

    /**
     * Gets the Middleware stack for managing request/response middleware.
     *
     * To manage command/result middleware, use getHandlerStack().
     *
     * @return HandlerStack
     */
    public function getHttpHandlerStack()
    {
        return $this->getHttpClient()->getConfig('handler');
    }

    /**
     * Provide a callback for converting Commands to Requests.
     *
     * @return callable
     */
    private function createRequestTransformer()
    {
        // Setup user agent string.
        $fullUserAgent = sprintf(
            '%s/%s %s',
            self::USER_AGENT,
            GpsInsight::VERSION,
            GuzzleHttp\default_user_agent()
        );

        return function (Command $command) use ($fullUserAgent) {
            $path = self::API_VERSION . '/' . $command->getName();
            $body = http_build_query($command->toArray());
            $headers = [
                'User-Agent' => $fullUserAgent,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Content-Length' => strlen($body),
            ];

            return new Request('POST', $path, $headers, $body);
        };
    }

    /**
     * Provide a callback for converting Responses to Results.
     *
     * @return callable
     */
    private function createResponseTransformer()
    {
        return function (Response $response, Request $request, Command $command) {
            $result = new Result(GuzzleHttp\json_decode($response->getBody(), JSON_OBJECT_AS_ARRAY));
            if ($result->isOk()) {
                return $result;
            }

            throw ApiCallException::resultNotOk($command, $result, $request, $response);
        };
    }
}
