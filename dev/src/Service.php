<?php

namespace GpsInsight\Api\Dev\V2;

use Doctrine\Common\Inflector\Inflector;

class Service
{
    /** @var string */
    public $displayName;

    /** @var string */
    public $apiName;

    /** @var string */
    public $pluralName;

    /** @var Method[] */
    public $methods;

    public function __construct($name, array $methods)
    {
        $this->displayName = $name;
        $this->apiName = strtolower($name);
        $this->pluralName = Inflector::pluralize($name);
        $this->methods = array_map(function (array $method) {
            return Method::create($this, $method);
        }, $methods);
    }
}
