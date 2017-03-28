<?php

namespace GpsInsight\Api\Test\V2;

use GpsInsight\Api\V2\Exception\AuthException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Exception\AuthException
 */
class AuthExceptionTest extends TestCase
{
    /**
     * @dataProvider provideFactoryTestCases
     * @param $method
     * @param array $words
     */
    public function testFactoriesForAuthErrors($method, array $words)
    {
        $ex = call_user_func([AuthException::class, $method]);
        foreach ($words as $word) {
            $this->assertContains($word, $ex->getMessage());
        }
    }

    public function provideFactoryTestCases()
    {
        return [
            'username' => ['usernameRequired', ['username']],
            'password' => ['passwordOrAppTokenRequired', ['password', 'app_token']],
            'session' => ['sessionTokenMissing', ['session_token']],
        ];
    }
}
