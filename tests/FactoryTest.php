<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Client;
use GpsInsight\Api\V2\Config;
use GpsInsight\Api\V2\Exception\InstantiationException;
use GpsInsight\Api\V2\Factory;
use GpsInsight\Api\V2\Middleware\Auth as AuthMiddleware;
use GpsInsight\Api\V2\Middleware\Channel as ChannelMiddleware;
use GpsInsight\Api\V2\Middleware\WireLog;
use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\Service\Driver as DriverService;
use GpsInsight\Api\V2\TokenCache\NullCache;
use GpsInsight\Api\V2\TokenCache\TokenCacheInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Log\LoggerInterface;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /**
     * @covers \GpsInsight\Api\V2\Factory::createHttpHandlerStack
     * @covers \GpsInsight\Api\V2\Factory::__construct
     */
    public function testCanCreateAHandlerStack()
    {
        $config = new Config(['wire_log' => true]);
        $handlerStack = (new Factory($config))->createHttpHandlerStack();

        $this->assertInstanceOf(HandlerStack::class, $handlerStack);
        $this->assertTrue($handlerStack->hasHandler());

        $debug = (string) $handlerStack;
        $this->assertContains(WireLog::MIDDLEWARE_NAME, $debug);
    }

    /**
     * @covers \GpsInsight\Api\V2\Factory::createHttpHandlerStack
     */
    public function testCanUseCustomHttpHandler()
    {
        $config = new Config([
            'http_handler' => function () {
                return new Response(200, [], 'foo');
            },
        ]);

        $handler = (new Factory($config))->createHttpHandlerStack()->resolve();
        $response = $handler(new Request('POST', 'http://example.com'), []);
        $this->assertEquals('foo', $response->getBody()->getContents());
    }

    /**
     * @covers \GpsInsight\Api\V2\Factory::createHttpClient
     */
    public function testCanCreateHttpClient()
    {
        $config = new Config([
            'http_options' => ['foo' => 'bar'],
        ]);

        $client = (new Factory($config))->createHttpClient();

        $this->assertInstanceOf(HttpClient::class, $client);
        $this->assertEquals('bar', $client->getConfig('foo'));
    }

    /**
     * @covers \GpsInsight\Api\V2\Factory::createClient
     */
    public function testCanCreateGpsInsightClient()
    {
        $config = new Config(['channel' => 'test']);
        $client = (new Factory($config))->createClient();
        $this->assertInstanceOf(Client::class, $client);

        $stackDebug = (string) $client->getHandlerStack();
        $this->assertContains(AuthMiddleware::MIDDLEWARE_NAME, $stackDebug);
        $this->assertContains(ChannelMiddleware::MIDDLEWARE_NAME, $stackDebug);
    }

    /**
     * @covers \GpsInsight\Api\V2\Factory::createServiceClient
     */
    public function testCanCreateAServiceClient()
    {
        $client = $this->createMock(Client::class);
        $client->method('call')->willReturn(new Result());

        $factory = new Factory(new Config());

        $driverService = $factory->createServiceClient('driver', $client);
        $this->assertInstanceOf(DriverService::class, $driverService);
    }

    /**
     * @covers \GpsInsight\Api\V2\Factory::createServiceClient
     */
    public function testFailsWhenCreatingANonExistentServiceClient()
    {
        $factory = new Factory(new Config());
        $client = $this->createMock(Client::class);

        $this->expectException(InstantiationException::class);
        $factory->createServiceClient('chicken', $client);
    }

    /**
     * @covers \GpsInsight\Api\V2\Factory::createTokenCache
     */
    public function testCanCreateTokenCacheFromConfig()
    {
        // Should work when token cache is explicitly provided.
        $cache = $this->createMock(TokenCacheInterface::class);
        $factory = new Factory(new Config([Config::TOKEN_CACHE => $cache]));
        $this->assertSame($cache, $factory->createTokenCache());

        // Should work when no token cache provided.
        $factory = new Factory(new Config());
        $this->assertInstanceOf(NullCache::class, $factory->createTokenCache());

        // Should fail when token cache is invalid.
        $this->expectException(InstantiationException::class);
        $factory = new Factory(new Config([Config::TOKEN_CACHE => 'foo']));
        $factory->createTokenCache();
    }

    /**
     * @covers \GpsInsight\Api\V2\Factory::createWireLog
     */
    public function testCanCreateWireLogConfig()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $factory = new Factory(new Config([Config::WIRE_LOG => $logger]));
        $wireLogMiddleware = $factory->createWireLog();
        $this->assertTrue(is_callable($wireLogMiddleware));
    }
}
