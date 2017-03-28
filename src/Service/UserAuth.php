<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to UserAuths.
 */
class UserAuth extends ServiceClient
{
    const SERVICE = 'userauth';

    /**
     * Set up an authorized session.
     *
     * Valid parameters:
     *
     * - username
     * - password
     * - user_context
     * - app_token
     *
     * @param array $params Parameters for userauth/login API.
     * @return Result The result of the userauth/login API.
     */
    public function login(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'login', $params);
    }

    /**
     * Destroy authorized session.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for userauth/logout API.
     * @return Result The result of the userauth/logout API.
     */
    public function logout(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'logout', $params);
    }

    /**
     * generates password reset code email or sms.
     *
     * Valid parameters:
     *
     * - username: username or email address
     * - method: 'sms' or 'email'
     *
     * @param array $params Parameters for userauth/sendpasswordreset API.
     * @return Result The result of the userauth/sendpasswordreset API.
     */
    public function sendPasswordReset(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'sendpasswordreset', $params);
    }

    /**
     * validates password reset confirmation code.
     *
     * Valid parameters:
     *
     * - username: username
     * - confirmation: confirmation code
     *
     * @param array $params Parameters for userauth/validatepasswordreset API.
     * @return Result The result of the userauth/validatepasswordreset API.
     */
    public function validatePasswordReset(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'validatepasswordreset', $params);
    }

    /**
     * resets password.
     *
     * Valid parameters:
     *
     * - password: new password
     * - confirmation: confirmation code
     *
     * @param array $params Parameters for userauth/resetpassword API.
     * @return Result The result of the userauth/resetpassword API.
     */
    public function resetPassword(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'resetpassword', $params);
    }
}
