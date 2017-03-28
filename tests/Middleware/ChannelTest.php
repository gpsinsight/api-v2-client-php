<?php

namespace GpsInsight\Api\Test\V2\Middleware;

use GpsInsight\Api\V2\Config;
use GpsInsight\Api\V2\Middleware\Channel;
use GuzzleHttp\Command\Command;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Middleware\Channel
 */
class ChannelTest extends TestCase
{
    public function testCanInsertChannelAndVersionIntoCommandParams()
    {
        $config = new Config(['channel' => 'foo', 'version' => 'bar']);
        $middleware = new MiddlewareWrapper(Channel::create($config));
        $command = new Command('fizz/buzz', []);
        $middleware->handle($command);

        $this->assertEquals('foo', $command['channel']);
        $this->assertEquals('bar', $command['v']);
    }
}
