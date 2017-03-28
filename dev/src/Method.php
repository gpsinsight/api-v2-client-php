<?php

namespace GpsInsight\Api\Dev\V2;

class Method
{
    /** @var string */
    public $apiName;

    /** @var string */
    public $name;

    /** @var string */
    public $notes;

    /** @var string[] */
    public $params;

    public static function create(Service $service, array $method)
    {
        $method = new Method($method);

        if ($method->name === 'list') {
            $method->name = $service->apiName === 'user'
                ? 'listUserApps'
                : 'list' . $service->pluralName;
        }

        return $method;
    }

    public function __construct(array $method)
    {
        $this->name = $method['name'];
        $this->apiName = strtolower($method['name']);
        $this->params = isset($method['param'])
            ? $method['param']
            : [];

        $this->notes = trim(preg_replace('/[\s]+/mu', ' ', $method['notes']));
        if (strlen($this->notes) > 112) {
            $this->notes = wordwrap($this->notes, 112, "\n     * ");
        }
    }
}
