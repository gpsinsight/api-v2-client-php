<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$files = new AppendIterator();
$files->append(Finder::create()
    ->files()
    ->name('*.php')
    ->notName('Factory.php')
    ->in(__DIR__ . '/src')
    ->getIterator()
);
$files->append(Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/vendor/guzzlehttp/command/src')
    ->getIterator()
);

return new Sami($files, [
    'title'     => 'GPS Insight API Client Library',
    'build_dir' => __DIR__ . '/build/apidocs',
    'cache_dir' => __DIR__ . '/build/cache/apidocs',
]);
