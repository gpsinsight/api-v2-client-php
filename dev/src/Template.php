<?php

namespace GpsInsight\Api\Dev\V2;

class Template
{
    /** @var string */
    public $path;

    public function __construct($name)
    {
        $this->path = realpath(__DIR__ . '/../templates') . "/{$name}.php";
    }

    public function render(array $data = [])
    {
        extract($data, EXTR_OVERWRITE);
        ob_start();
        include $this->path;
        return '<?php' . PHP_EOL . ob_get_clean();
    }
}
