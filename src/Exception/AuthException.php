<?php

namespace GpsInsight\Api\V2\Exception;

use RuntimeException;

/**
 * Exception that represents an authentication problem.
 */
class AuthException extends RuntimeException implements GpsInsightException
{
    /**
     * Throw an exception when a username is not provided.
     *
     * @return AuthException
     */
    public static function usernameRequired()
    {
        return new self('Authenticating to the GPSInsight API requires providing a "username". Please specify the '
            . '"username" value in your config or in the parameters of the API call.');
    }

    /**
     * Throw an exception when a password or app token is not provided.
     *
     * @return AuthException
     */
    public static function passwordOrAppTokenRequired()
    {
        return new self('A "password" or "app_token" is required to retrieve a "session_token" for authentication. '
            . 'Please specify one of these values in your config or in the parameters of the API call.');
    }

    /**
     * Throw an exception if a session token cannot be retrieved.
     *
     * @return AuthException
     */
    public static function sessionTokenMissing()
    {
        return new self('The "session_token" is missing from the result of userauth/login. The authentication process '
            . 'did not succeed.');
    }
}
