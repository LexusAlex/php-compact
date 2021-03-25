<?php

declare(strict_types=1);

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Compact\Ci\Http\Controllers;

return static function (App $app): void {
    $app->get('/', Controllers\IndexController\HomeAction::class);
    $app->group('/v1', function (RouteCollectorProxy $group): void {
        $group->group('/authentication', function (RouteCollectorProxy $group): void {
            $group->post('/join/by/email', Controllers\V1\Authentication\JoinByEmailController\RequestAction::class);
        });
    });
};
