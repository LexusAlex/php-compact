#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Application;

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/app/container.php';

$application = new Application('Cli');

$commands = $container->get('configurations')['cli']['commands'];

foreach ($commands as $command) {
    $application->add($container->get($command));
}

try {
    $application->run();
} catch (Exception $e) {

}
