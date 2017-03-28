<?php

require __DIR__ . '/../../vendor/autoload.php';

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\Dev\V2\ServiceBuilder;
use GpsInsight\Api\V2\GpsInsight;
use Monolog\Logger;

$logger = new Logger('BUILD_SERVICES');

$logger->info('Loading credentials...');
$configPath = __DIR__ . '/../../config.php';
if (is_readable($configPath)) {
    $config = @include $configPath;
} else {
    $logger->error("Failed to load config file at {$configPath}.");
    exit(1);
}

$logger->info('Instantiating GpsInsight client...');
if (!isset($config['credentials'])) {
    $logger->error("No credentials were provided in the config file.");
    exit(1);
}
$gpsInsight = new GpsInsight($config['credentials']);

$targetDir = realpath(__DIR__ . '/../../src/Service') . '/';
$logger->info("Ensure target directory ($targetDir) exists..");
if (!is_dir($targetDir)) {
    mkdir($targetDir);
}

$logger->info("Build the ServiceClient classes foreach service...");
$serviceBuilder = new ServiceBuilder($gpsInsight->getClient(), $targetDir, $logger);
$serviceBuilder->buildServices();
$logger->info("Code generation complete. Performing sanity test...");

try {
    $result = $gpsInsight->driver->listDrivers();
} catch (Exception $e) {
    $result = null;
}
if ($result instanceof Result) {
    $logger->info("Sanity test passed. Looks good!");
} else {
    $logger->error("Something has gone wrong!");
}
