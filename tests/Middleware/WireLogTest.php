<?php

namespace GpsInsight\Api\Test\V2\Middleware;

use GpsInsight\Api\V2\Middleware\WireLog;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Middleware\WireLog
 */
class WireLogTest extends TestCase
{
    public function testThrowExceptionOnNonStream()
    {
        $this->setExpectedException('InvalidArgumentException');
        new WireLog('foo');
    }

    public function testCanWriteToLog()
    {
        $stream = fopen('php://temp', 'w+');
        $log = new WireLog($stream);
        $log->log('a', 'b');

        rewind($stream);
        $this->assertEquals("\nb\n", stream_get_contents($stream));

        fclose($stream);
    }

    public function testFormatIsAsIntended()
    {
        $expected = <<<CONTENT
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
REQUEST
================================================================================
RESPONSE
<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

CONTENT;
        $actual = strtr(WireLog::getFormat(), [
            '{request}'  => 'REQUEST',
            '{response}' => 'RESPONSE',
        ]);

        $this->assertEquals($expected, $actual);
    }
}
