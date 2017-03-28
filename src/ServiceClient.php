<?php

namespace GpsInsight\Api\V2;

/**
 * Base class for all service-specific clients.
 */
abstract class ServiceClient
{
    /** @var Client Guzzle-based HTTP client for API interaction. */
    protected $client;

    /**
     * @param Client $client Guzzle-based HTTP client for API interaction.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
