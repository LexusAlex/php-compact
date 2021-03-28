<?php

declare(strict_types=1);

use Slim\App;

return static function (App $app): void {
    $app->addErrorMiddleware((bool)getenv('PHP_COMPACT_DISPLAY_DETAILS'), (bool)getenv('PHP_COMPACT_DEBUG'), true);
    $app->addBodyParsingMiddleware();
};
