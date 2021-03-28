<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Compact\Ci\Http\Controllers;

return static function (ContainerInterface $container): App {
    $app = AppFactory::createFromContainer($container);
    (require __DIR__ . '/routes.php')($app);
    (require __DIR__ . '/middleware.php')($app);
    return $app;
};
