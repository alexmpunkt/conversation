<?php
if (!file_exists($file = __DIR__ . '/../vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run test suite.');
}
$loader = require $file;
$loader->add('Conversio\Conversation\Tests', __DIR__ . '/unit');