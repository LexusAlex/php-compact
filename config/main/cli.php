<?php

declare(strict_types=1);

use Compact\Ci\Cli;

return [
    'configurations' => [
        'cli' => [
            'commands' => [
                Cli\IndexCommand::class,
            ],
        ],
    ],
];
