<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Client;
use GpsInsight\Api\V2\Config;
use GpsInsight\Api\V2\Exception\ApiCallException;
use GpsInsight\Api\V2\Factory;
use GpsInsight\Api\V2\Result;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Client
 */
class ClientTest extends TestCase
{
    private function createClient()
    {
        $factory = new Factory(new Config());

        return new Client($factory->createHttpClient());
    }

    public function testCanCallAnApi()
    {
        $client = $this->createClient();

        $data = ['data' => ['foo' => 'bar'], 'head' => ['status' => Result::STATUS_OK]];
        $client->getHttpHandlerStack()->setHandler(new MockHandler([
            new Response(200, [], json_encode($data)),
        ]));

        $result = $client->call('fizz', 'buzz');
        $this->assertEquals(['foo' => 'bar'], $result->getData());
    }

    public function testGuzzleExceptionsAreRethrownAsGpsException()
    {
        $client = $this->createClient();

        $client->getHttpHandlerStack()->setHandler(new MockHandler([
            new TransferException('bad connection'),
        ]));

        try {
            $client->call('fizz', 'buzz');
            $ex = null;
        } catch (\Exception $ex) {
            // $ex is set
        }

        $this->assertInstanceOf(ApiCallException::class, $ex);
        $this->assertContains('bad connection', $ex->getMessage());
    }

    public function testBadResultsAreThrownAsGpsException()
    {
        $client = $this->createClient();

        $client->getHttpHandlerStack()->setHandler(new MockHandler([
            new Response(503, [], json_encode([
                'head' => ['status' => 'ERROR'],
                'errors' => [['code' => 503], 'reason' => 'Service Unavailable']
            ]))
        ]));

        $this->expectException(ApiCallException::class);
        $client->call('fizz', 'buzz');
    }

    public function testCanCallAnApiAsynchronously()
    {
        $client = $this->createClient();

        $data = ['data' => ['foo' => 'bar'], 'head' => ['status' => Result::STATUS_OK]];
        $client->getHttpHandlerStack()->setHandler(new MockHandler([
            new Response(200, [], json_encode($data)),
        ]));

        $promise = $client->callAsync('fizz', 'buzz')->then(function (Result $result) {
            return $result->getData();
        });

        $data = $promise->wait();
        $this->assertEquals(['foo' => 'bar'], $data);
    }

    public function testExceptionsWorksAsynchronously()
    {
        $client = $this->createClient();

        $client->getHttpHandlerStack()->setHandler(new MockHandler([
            new TransferException('bad connection'),
        ]));

        $promise = $client->callAsync('fizz', 'buzz')->otherwise(function (\Exception $ex) {
            return $ex;
        });

        $exception = $promise->wait();

        $this->assertInstanceOf(ApiCallException::class, $exception);
        $this->assertContains('bad connection', $exception->getMessage());
    }
}
