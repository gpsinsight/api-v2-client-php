<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Exception\ApiCallException;
use GpsInsight\Api\V2\Exception\RateLimitException;
use GpsInsight\Api\V2\Result;
use GuzzleHttp\Command\CommandInterface as Command;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Exception\ApiCallException
 */
class ApiCallExceptionTest extends TestCase
{
    /**
     * @dataProvider providesResultsWithErrors
     * @param Result $result
     * @param string $exceptionClass
     * @param string $exceptionMessage
     * @param int $errorCount
     */
    public function testExceptionThrownForResultWithErrors(
        Result $result,
        $exceptionClass,
        $exceptionMessage,
        $errorCount
    ) {
        // Mock command and request/response
        $command = $this->createMock(Command::class);
        $command->method('getName')->willReturn('foo/bar');
        $request = $this->createMock(Request::class);
        $response = $this->createMock(Response::class);
        $response->method('getStatusCode')->willReturn(400);
        $response->method('getReasonPhrase')->willReturn('Bad Request');

        $exception = ApiCallException::resultNotOk($command, $result, $request, $response);
        $this->assertInstanceOf($exceptionClass, $exception);
        $this->assertRegExp('#' . preg_quote($exceptionMessage, '#') . '#', $exception->getMessage());
        $this->assertInstanceOf(Result::class, $exception->getResult());
        $this->assertCount($errorCount, $exception->getResult()->getErrors());
    }

    public function providesResultsWithErrors()
    {
        $testCases = [];

        $result = $this->createMock(Result::class);
        $result->method('getErrors')->willReturn([['code' => '429', 'error' => '']]);
        $testCases[] = [$result, RateLimitException::class, 'Too many requests', 1];

        $result = $this->createMock(Result::class);
        $result->method('getErrors')->willReturn([['code' => '500', 'error' => 'Service Unavailable']]);
        $testCases[] = [$result, ApiCallException::class, 'Service Unavailable', 1];

        $result = $this->createMock(Result::class);
        $result->method('getErrors')->willReturn([]);
        $testCases[] = [$result, ApiCallException::class, 'Bad Request', 0];

        return $testCases;
    }

    public function testExceptionThrownForFailedApiCalls()
    {
        $command = $this->createMock(Command::class);
        $command->method('getName')->willReturn('foo/bar');
        $request = $this->createMock(Request::class);
        $response = $this->createMock(Response::class);
        $response->method('getStatusCode')->willReturn(400);
        $response->method('getReasonPhrase')->willReturn('Bad Request');
        $previous = new RequestException('baz', $request, $response);

        $exception = ApiCallException::callFailed($command, $previous);
        $message = $exception->getMessage();
        $this->assertInstanceOf(ApiCallException::class, $exception);
        $this->assertContains('foo/bar', $message);
        $this->assertContains('baz', $message);
    }

    public function testDoesNothingIfExceptionSameType()
    {
        $command = $this->createMock(Command::class);
        $previous = $this->createMock(ApiCallException::class);
        $exception = ApiCallException::callFailed($command, $previous);
        $this->assertSame($previous, $exception);
    }
}
