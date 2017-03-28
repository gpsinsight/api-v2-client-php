<?php

namespace GpsInsight\Api\V2;

/**
 * Enum for service names.
 */
final class Services
{
    const ALERT = 'alert';
    const API_APP = 'apiapp';
    const CHANNEL = 'channel';
    const CUSTOMER_SITE = 'customersite';
    const DEVICE = 'device';
    const DISPATCH = 'dispatch';
    const DRIVER = 'driver';
    const DRIVER_GROUP = 'drivergroup';
    const FEUL_CARD = 'fuelcard';
    const GARMIN = 'garmin';
    const GEOCODE = 'geocode';
    const HEARTBEAT = 'heartbeat';
    const HIERARCHY = 'hierarchy';
    const HIERARCHY_NODE = 'hierarchynode';
    const LANDMARK = 'landmark';
    const LANDMARK_GROUP = 'landmarkgroup';
    const ROUTE = 'route';
    const STOP_NOTE = 'stopnote';
    const SMS_MESSAGING = 'smsmessaging';
    const USER = 'user';
    const USER_AUTH = 'userauth';
    const VEHICLE = 'vehicle';
    const VEHICLE_GROUP = 'vehiclegroup';
    const VEHICLE_REPORT = 'vehiclereport';
    const VIN = 'vin';
    const WEBHOOK = 'webhook';

    /**
     * @var array List of service names.
     */
    private static $names = [
        self::ALERT => 'Alert',
        self::API_APP => 'ApiApp',
        self::CHANNEL => 'Channel',
        self::CUSTOMER_SITE => 'CustomerSite',
        self::DEVICE => 'Device',
        self::DISPATCH => 'Dispatch',
        self::DRIVER => 'Driver',
        self::DRIVER_GROUP => 'DriverGroup',
        self::FEUL_CARD => 'FuelCard',
        self::GARMIN => 'Garmin',
        self::GEOCODE => 'Geocode',
        self::HEARTBEAT => 'Heartbeat',
        self::HIERARCHY => 'Hierarchy',
        self::HIERARCHY_NODE => 'HierarchyNode',
        self::LANDMARK => 'Landmark',
        self::LANDMARK_GROUP => 'LandmarkGroup',
        self::ROUTE => 'Route',
        self::STOP_NOTE => 'StopNote',
        self::SMS_MESSAGING => 'SmsMessaging',
        self::USER => 'User',
        self::USER_AUTH => 'UserAuth',
        self::VEHICLE => 'Vehicle',
        self::VEHICLE_GROUP => 'VehicleGroup',
        self::VEHICLE_REPORT => 'VehicleReport',
        self::VIN => 'Vin',
        self::WEBHOOK => 'Webhook',
    ];

    /**
     * Get list of all service names.
     *
     * @return array
     */
    public static function all()
    {
        return self::$names;
    }
}
