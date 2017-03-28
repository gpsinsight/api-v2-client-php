<?php

namespace GpsInsight\Api\Test\V2\Middleware;

use GpsInsight\Api\V2\Config;
use GpsInsight\Api\V2\Exception\AuthException;
use GpsInsight\Api\V2\Middleware\Auth;
use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\TokenCache\CallbackCache;
use GpsInsight\Api\V2\TokenCache\NullCache;
use GpsInsight\Api\V2\TokenCache\TokenCacheInterface;
use GuzzleHttp\Command\Command;
use GuzzleHttp\Promise;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GpsInsight\Api\V2\Middleware\Auth
 */
class AuthTest extends TestCase
{
    /**
     * @param Command $command
     * @param Config $config
     * @param TokenCacheInterface $cache
     * @param array $resultParams
     * @dataProvider provideTestCasesForSuccessfulAuth
     */
    public function testCanInsertAuthParamsToCommand(
        Command $command,
        Config $config,
        TokenCacheInterface $cache,
        array $resultParams
    ) {
        $middleware = new MiddlewareWrapper(Auth::create($config, $cache));
        try {
            $middleware->handle($command);
        } catch (AuthException $ex) {
            $this->fail($ex->getMessage());
        }

        $this->assertEquals($resultParams, $command->toArray());
    }

    public function provideTestCasesForSuccessfulAuth()
    {
        $username = 'aaa';
        $password = 'bbb';
        $app_token = 'ccc';
        $session_token = 'ddd';
        $nullCache = new NullCache();

        return [
            'username and password in config' => [
                new Command('userauth/login'),
                new Config(compact('username', 'password')),
                $nullCache,
                compact('username', 'password')
            ],
            'username and app_token in config' => [
                new Command('userauth/login'),
                new Config(compact('username', 'app_token')),
                $nullCache,
                compact('username', 'app_token')
            ],
            'username and session_token in config' => [
                new Command('foo/bar'),
                new Config(compact('username', 'session_token')),
                $nullCache,
                compact('username', 'session_token')
            ],
            'username and password in params' => [
                new Command('userauth/login', compact('username', 'password')),
                new Config(),
                $nullCache,
                compact('username', 'password')
            ],
            'username and app_token in params' => [
                new Command('userauth/login', compact('username', 'app_token')),
                new Config(),
                $nullCache,
                compact('username', 'app_token')
            ],
            'username and session_token in params' => [
                new Command('foo/bar', compact('username', 'session_token')),
                new Config(),
                $nullCache,
                compact('username', 'session_token')
            ],
            'username in config and session_token in cache' => [
                new Command('foo/bar'),
                new Config(compact('username')),
                $this->createCache($username, null, $session_token),
                compact('username', 'session_token')
            ],
            'username and app_token in config and session_token in cache' => [
                new Command('foo/bar'),
                new Config(compact('username', 'app_token')),
                $this->createCache($username, $app_token, $session_token),
                compact('username', 'session_token')
            ],
        ];
    }

    public function testFailsAuthWhenUsernameNotProvided()
    {
        $middleware = new MiddlewareWrapper(Auth::create(new Config()));
        $command = new Command('foo/bar');
        $this->expectException(AuthException::class);
        $middleware->handle($command);
    }

    public function testFailsLoginWhenUsernameNotProvided()
    {
        $middleware = new MiddlewareWrapper(Auth::create(new Config()));
        $command = new Command('userauth/login');
        $this->expectException(AuthException::class);
        $middleware->handle($command);
    }

    public function testFailsLoginWhenBothPasswordAndAppTokenNotProvided()
    {
        $config = new Config(['username' => 'foo']);
        $middleware = new MiddlewareWrapper(Auth::create($config));
        $command = new Command('userauth/login');
        $this->expectException(AuthException::class);
        $middleware->handle($command);
    }

    public function testCanPerformLoginToGetSessionToken()
    {
        $config = new Config([
            'username' => 'fizz',
            'app_token' => 'buzz'
        ]);
        $middleware = new MiddlewareWrapper(Auth::create($config));
        $middleware->setResult(new Result([
            'data' => ['token' => 'abc123']
        ]));

        $command = new Command('foo/bar');
        $middleware->handle($command);
        $this->assertEquals('abc123', $command['session_token']);
        $this->assertEquals('abc123', $config['session_token']);
    }

    public function testFailsWhenLogin()
    {
        $config = new Config([
            'username' => 'fizz',
            'app_token' => 'buzz'
        ]);
        $middleware = new MiddlewareWrapper(Auth::create($config));
        $middleware->setResult(new Result([
            'errors' => [['code' => 403]]
        ]));

        $this->expectException(AuthException::class);
        $middleware->handle(new Command('foo/bar'));
    }

    private function createCache($username, $appToken, $sessionToken)
    {
        $data = [md5($username . $appToken) => $sessionToken];

        return new CallbackCache(
            function ($key) use (&$data) {
                return isset($data[$key]) ? $data[$key] : null;
            },
            function ($key, $token) use (&$data) {
                return $data[$key] = $token;
            }
        );
    }
}
