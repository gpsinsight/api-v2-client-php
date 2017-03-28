<?php

namespace GpsInsight\Api\V2\Exception;

use Exception;
use GpsInsight\Api\V2\Result;
use GuzzleHttp\Command\CommandInterface as Command;
use GuzzleHttp\Command\Exception\CommandException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Exception that represents a failed API call.
 */
class ApiCallException extends CommandException implements GpsInsightException
{
    const BASE_MESSAGE = 'The API call to %s failed: ';

    /** @var Result */
    private $result;

    /**
     * @param string $message
     * @param Command $command
     * @param Result|null $result
     * @param Request|null $request
     * @param Response|null $response
     * @param Exception|null $previous
     */
    public function __construct(
        $message,
        Command $command,
        Result $result = null,
        Request $request = null,
        Response $response = null,
        \Exception $previous = null
    ) {
        parent::__construct($message, $command, $previous, $request, $response);
        $this->result = $result;
    }

    /**
     * Gets the associated result
     *
     * @return Result|null
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Throw an exception when an API call's result contains errors.
     *
     * @param Command $command
     * @param Result $result
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public static function resultNotOk(
        Command $command,
        Result $result,
        Request $request,
        Response $response
    ) {
        // Initiate the message.
        $class = self::class;
        $message = sprintf(self::BASE_MESSAGE, $command->getName());

        // Extract error information from the result/response.
        $errors = $result->getErrors();
        $error = !empty($errors) ? $errors[0] : [
            'code' => $response->getStatusCode(),
            'error' => $response->getReasonPhrase(),
        ];

        // Return the correct exception object.
        if ($error['code'] == 429) {
            $message .= 'Too many requests within a 24-hour period ';
            $message .= '(rate limits are calculated based on a rolling 24-hour window)';
            $class = RateLimitException::class;
        } else {
            $message .= "[{$error['code']}] {$error['error']}";
        }

        return new $class($message, $command, $result, $request, $response);
    }

    /**
     * Throw an exception when an API call does not produce a result.
     *
     * @param Command $command
     * @param Exception $prev
     * @return CommandException
     */
    public static function callFailed(Command $command, Exception $prev)
    {
        // If the exception is already of this type, just return it.
        if ($prev instanceof self) {
            return $prev;
        }

        // Initiate parts of the exception.
        $message = sprintf(self::BASE_MESSAGE, $command->getName()) . $prev->getMessage();
        $result = $request = $response = null;
        if ($prev instanceof RequestException || $prev instanceof CommandException) {
            $request = $prev->getRequest();
            $response = $prev->getResponse();
        }

        // Create the exception.
        return new self($message, $command, $result, $request, $response, $prev);
    }
}
