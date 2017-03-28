<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to SmsMessagings.
 */
class SmsMessaging extends ServiceClient
{
    const SERVICE = 'smsmessaging';

    /**
     * Get the message/query history for all sms messages.
     *
     * Valid parameters:
     *
     * - start: start of a date span (optional)
     * - end: end date of a date span (optional)
     * - type: Query or Message (optional, default:both)
     * - box: In or Out (optional, default:both)
     * - search: do a string search on messages (optional)
     * - phones: only match on a specified list of phones (comma delimited, optional)
     * - vin: return messages from contact info associated to vin (optional)
     *
     * @param array $params Parameters for smsmessaging/history API.
     * @return Result The result of the smsmessaging/history API.
     */
    public function history(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'history', $params);
    }

    /**
     * Get formatted conversation view of history.
     *
     * Valid parameters:
     *
     * - start: start of a date span (optional)
     * - end: end date of a date span (optional)
     *
     * @param array $params Parameters for smsmessaging/conversations API.
     * @return Result The result of the smsmessaging/conversations API.
     */
    public function conversations(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'conversations', $params);
    }

    /**
     * Show numbers associated with vehicles and/or drivers.
     *
     * Valid parameters:
     *
     * - group: vehicle group name, group_id, or partial group name (optional)
     * - driver_group: driver group name, group_id, or partial group name (optional)
     *
     * @param array $params Parameters for smsmessaging/numbers API.
     * @return Result The result of the smsmessaging/numbers API.
     */
    public function numbers(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'numbers', $params);
    }

    /**
     * Send an SMS to one or many phone numbers.
     *
     * Valid parameters:
     *
     * - message: the message to send
     * - numbers: one phone number, or a list of comma separated phone numbers to send the message to.
     *
     * @param array $params Parameters for smsmessaging/sendmessages API.
     * @return Result The result of the smsmessaging/sendmessages API.
     */
    public function sendMessages(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'sendmessages', $params);
    }
}
