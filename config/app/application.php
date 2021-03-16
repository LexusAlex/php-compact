<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Compact\Ci\Http\Controllers;
use Slim\Routing\RouteCollectorProxy;

return static function (ContainerInterface $container): App {
    $app = AppFactory::createFromContainer($container);
    $app->get('/', Controllers\IndexController\HomeAction::class);
    $app->group('/v1', function (RouteCollectorProxy $group): void {
        $group->group('/authentication', function (RouteCollectorProxy $group): void {
            $group->post('/join/by/email', Controllers\V1\Authentication\JoinByEmailController\RequestAction::class);
        });
    });
    return $app;
};
