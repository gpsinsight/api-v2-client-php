<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Result;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Result
 */
class ResultTest extends TestCase
{
    private static $content = [
        'head' => ['a' => 1, 'status' => Result::STATUS_ERROR],
        'data' => ['b' => 2, 'c' => 3],
        'errors' => [['code' => 503, 'error' => 'Uh, oh!']],
    ];

    public function testCanGetHeadDataAndErrors()
    {
        $result = new Result(self::$content);
        $this->assertArrayHasKey('a', $result->gethead());
        $this->assertArrayHasKey('b', $result->getData());

        $errors = $result->getErrors();
        $this->assertFalse($result->isOk());
        $this->assertCount(1, $errors);
        $this->assertArrayHasKey('code', $errors[0]);
        $this->assertEquals(503, $errors[0]['code']);
    }

    /**
     * @requires PHP 5.6
     */
    public function testThatAllSectionsIncludedInVarDump()
    {
        $result = new Result();
        ob_start();
        var_dump($result);
        $dump = ob_get_clean();

        $this->assertContains('head', $dump);
        $this->assertContains('data', $dump);
        $this->assertContains('errors', $dump);
    }
}
