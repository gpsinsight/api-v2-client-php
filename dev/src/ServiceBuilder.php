<?php

namespace GpsInsight\Api\Dev\V2;

use GpsInsight\Api\V2\Client;
use GpsInsight\Api\V2\Services;
use Psr\Log\LoggerInterface;

class ServiceBuilder
{
    /** @var LoggerInterface */
    private $logger;

    /** @var client */
    private $client;

    /** @var string */
    private $targetDir;

    public function __construct(Client $client, $targetDir, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->targetDir = $targetDir;
        $this->logger = $logger;
    }

    public function buildServices()
    {
        foreach ($this->getServices() as $service) {
            $this->logger->info("Creating PHP code for the {$service->displayName} service.");
            $code = (new Template('service'))->render(['service' => $service]);
            $this->writeFile($service, $code);
        }
    }

    private function getServices()
    {
        return array_map(function ($service) {
            return new Service($service, $this->client->call($service, 'methods')->getData());
        }, Services::all());
    }

    private function writeFile(Service $service, $code)
    {
        $filename = $this->targetDir . $service->displayName . '.php';
        $this->logger->info("Writing code for {$service->displayName} service to file...");
        $result = file_put_contents($filename, $code);

        if ($result) {
            $this->logger->info("Writing file {$filename} succeeded.");
        } else {
            $this->logger->error("Failed to write file {$filename}.");
        }
    }
}
