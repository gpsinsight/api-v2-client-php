<?php
    /** @var \GpsInsight\Api\Dev\V2\Service $service */
?>

namespace GpsInsight\Api\V2\Service;

use GpsInsight\Api\V2\Result;
use GpsInsight\Api\V2\ServiceClient;

/**
 * Grants access to the API operations related to <?= $service->pluralName ?>.
 */
class <?= $service->displayName ?> extends ServiceClient
{
    const SERVICE = '<?= $service->apiName ?>';
<?php foreach ($service->methods as $method) : ?>

    /**
     * <?= rtrim($method->notes, '.') ?>.
     *
     * Valid parameters:
     *
<?php foreach ($method->params as $param) : ?>
     * - <?= $param . PHP_EOL ?>
<?php endforeach ?>
     *
     * @param array $params Parameters for <?= $service->apiName ?>/<?= $method->apiName ?> API.
     * @return Result The result of the <?= $service->apiName ?>/<?= $method->apiName ?> API.
     */
    public function <?= $method->name ?>(array $params = [])
    {
        return $this->client->call(self::SERVICE, '<?= $method->apiName ?>', $params);
    }
<?php endforeach ?>
}
