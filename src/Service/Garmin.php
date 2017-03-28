<?php

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to Garmins.
 */
class Garmin extends ServiceClient
{
    const SERVICE = 'garmin';

    /**
     * Add a message to a Canned Message Group.
     *
     * Valid parameters:
     *
     * - message_id
     * - group
     *
     * @param array $params Parameters for garmin/addmessagetocannedmessagegroup API.
     * @return Result The result of the garmin/addmessagetocannedmessagegroup API.
     */
    public function addMessageToCannedMessageGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addmessagetocannedmessagegroup', $params);
    }

    /**
     * Add a vehicle to a canned message group.
     *
     * Valid parameters:
     *
     * - vehicle
     * - group
     *
     * @param array $params Parameters for garmin/addvehicletocannedmessagegroup API.
     * @return Result The result of the garmin/addvehicletocannedmessagegroup API.
     */
    public function addVehicleToCannedMessageGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'addvehicletocannedmessagegroup', $params);
    }

    /**
     * create a canned message.
     *
     * Valid parameters:
     *
     * - message: (Message, Response, Status)
     * - type
     *
     * @param array $params Parameters for garmin/createcannedmessage API.
     * @return Result The result of the garmin/createcannedmessage API.
     */
    public function createCannedMessage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'createcannedmessage', $params);
    }

    /**
     * create a canned message group.
     *
     * Valid parameters:
     *
     * - type:  (Message, Response, Status)
     * - name
     *
     * @param array $params Parameters for garmin/createcannedmessagegroup API.
     * @return Result The result of the garmin/createcannedmessagegroup API.
     */
    public function createCannedMessageGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'createcannedmessagegroup', $params);
    }

    /**
     * expire a canned message.
     *
     * Valid parameters:
     *
     * - message_id
     *
     * @param array $params Parameters for garmin/deletecannedmessage API.
     * @return Result The result of the garmin/deletecannedmessage API.
     */
    public function deleteCannedMessage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'deletecannedmessage', $params);
    }

    /**
     * Dispatch a garmin to a location (address or landmark or latitude,longitude).
     *
     * Valid parameters:
     *
     * - vehicle: the vehicle to dispatch
     * - address: an address to send the dispatch (optional)
     * - landmark: a landmark ID or name to send the dispatch (optional)
     * - latitude: to send dispatch (optional)
     * - longitude: to send dispatch (optional)
     * - location: name to override location on the dispatch
     *
     * @param array $params Parameters for garmin/dispatch API.
     * @return Result The result of the garmin/dispatch API.
     */
    public function dispatch(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'dispatch', $params);
    }

    /**
     * get canned message by message type and seq or by message_id.
     *
     * Valid parameters:
     *
     * - message_type: (Message, Response, Status)
     * - seq
     * - message_id
     *
     * @param array $params Parameters for garmin/getcannedmessage API.
     * @return Result The result of the garmin/getcannedmessage API.
     */
    public function getCannedMessage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getcannedmessage', $params);
    }

    /**
     * get canned message group, including messages and vehicles.
     *
     * Valid parameters:
     *
     * - group
     *
     * @param array $params Parameters for garmin/getcannedmessagegroup API.
     * @return Result The result of the garmin/getcannedmessagegroup API.
     */
    public function getCannedMessageGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getcannedmessagegroup', $params);
    }

    /**
     * Get Receieved Custom Forms.
     *
     * Valid parameters:
     *
     * - group:   (optional)
     * - vehicle: (optional)
     * - form:    (optional)
     * - start:   (optional)
     * - end:     (optional)
     *
     * @param array $params Parameters for garmin/getreceivedcustomforms API.
     * @return Result The result of the garmin/getreceivedcustomforms API.
     */
    public function getReceivedCustomForms(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'getreceivedcustomforms', $params);
    }

    /**
     * Get the dispatch/message history (and queue) for a vehicle group.
     *
     * Valid parameters:
     *
     * - group: vehicle group name, group_id, or partial group name (optional)
     * - vehicle: vehicle serial_number, vin or name (optional)
     * - start: start date for sent messages (optional, default 1 month ago)
     * - type: Dispatch or Message (optional)
     * - queue: int show queue details [1,0] (optional, default=1)
     *
     * @param array $params Parameters for garmin/history API.
     * @return Result The result of the garmin/history API.
     */
    public function history(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'history', $params);
    }

    /**
     * List all vehicles capable of receiving a dispatch.
     *
     * Valid parameters:
     *
     *
     * @param array $params Parameters for garmin/list API.
     * @return Result The result of the garmin/list API.
     */
    public function listGarmins(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'list', $params);
    }

    /**
     * List canned message groups.
     *
     * Valid parameters:
     *
     * - message_type: (Message, Response, Status)
     *
     * @param array $params Parameters for garmin/listcannedmessagegroups API.
     * @return Result The result of the garmin/listcannedmessagegroups API.
     */
    public function listCannedMessageGroups(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listcannedmessagegroups', $params);
    }

    /**
     * List canned messages.
     *
     * Valid parameters:
     *
     * - message_type: (Message, Response, Status)
     *
     * @param array $params Parameters for garmin/listcannedmessages API.
     * @return Result The result of the garmin/listcannedmessages API.
     */
    public function listCannedMessages(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'listcannedmessages', $params);
    }

    /**
     * Message to a garmin.
     *
     * Valid parameters:
     *
     * - vehicle: the vehicle to dispatch
     * - message: message to be sent
     *
     * @param array $params Parameters for garmin/message API.
     * @return Result The result of the garmin/message API.
     */
    public function message(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'message', $params);
    }

    /**
     * Get the dispatch/message queue for a vehicle group.
     *
     * Valid parameters:
     *
     * - group: vehicle group name, group_id, or partial group name
     * - start: start date for sent messages (optional, default 1 month ago)
     * - type: Dispatch or Message (optional)
     *
     * @param array $params Parameters for garmin/queue API.
     * @return Result The result of the garmin/queue API.
     */
    public function queue(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'queue', $params);
    }

    /**
     * Remove Canned Message Group.
     *
     * Valid parameters:
     *
     * - group
     * - ignore_dependencies: (optional)
     *
     * @param array $params Parameters for garmin/removecannedmessagegroup API.
     * @return Result The result of the garmin/removecannedmessagegroup API.
     */
    public function removeCannedMessageGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removecannedmessagegroup', $params);
    }

    /**
     * Remove a message from a canned message group.
     *
     * Valid parameters:
     *
     * - group
     * - seq
     * - message_id
     *
     * @param array $params Parameters for garmin/removemessagefromcannedmessagegroup API.
     * @return Result The result of the garmin/removemessagefromcannedmessagegroup API.
     */
    public function removeMessageFromCannedMessageGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removemessagefromcannedmessagegroup', $params);
    }

    /**
     * Remove a vehicle from a Canned Message group.
     *
     * Valid parameters:
     *
     * - group
     * - vehicle
     *
     * @param array $params Parameters for garmin/removevehiclefromcannedmessagegroup API.
     * @return Result The result of the garmin/removevehiclefromcannedmessagegroup API.
     */
    public function removeVehicleFromCannedMessageGroup(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'removevehiclefromcannedmessagegroup', $params);
    }

    /**
     * Sync Canned Messages to garmin devices by vehicle.
     *
     * Valid parameters:
     *
     * - vehicles
     * - id_type: (vehicle, vin, lmu_serial, nuvi_serial)
     * - reupload: (optional - re-uploads all canned messages)
     *
     * @param array $params Parameters for garmin/synccannedmessagesbyvehicle API.
     * @return Result The result of the garmin/synccannedmessagesbyvehicle API.
     */
    public function syncCannedMessagesByVehicle(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'synccannedmessagesbyvehicle', $params);
    }

    /**
     * translate the message type text value into its respective code.
     *
     * Valid parameters:
     *
     * - value
     *
     * @param array $params Parameters for garmin/translatemessagetype API.
     * @return Result The result of the garmin/translatemessagetype API.
     */
    public function translateMessageType(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'translatemessagetype', $params);
    }

    /**
     * create a canned message.
     *
     * Valid parameters:
     *
     * - message_id
     * - message
     *
     * @param array $params Parameters for garmin/updatecannedmessage API.
     * @return Result The result of the garmin/updatecannedmessage API.
     */
    public function updateCannedMessage(array $params = [])
    {
        return $this->client->call(self::SERVICE, 'updatecannedmessage', $params);
    }
}
