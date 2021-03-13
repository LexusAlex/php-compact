<?php

use Psr\Container\ContainerInterface;

return [
    PDO::class => static function (ContainerInterface $container) {
        /**
         * @var array $configuration
         * @psalm-suppress MixedArrayAccess
         * @psalm-suppress MixedArgument
         */
        $configuration = $container->get('configurations')['mariadb'];
        $dsn = $configuration['driver'] . ':dbname=' . $configuration['dbname'] . ';host=' . $configuration['host']  .
        ';port=' . $configuration['port'];
        return new PDO(
            $dsn,
            $configuration['user'],
            $configuration['password'],
            $configuration['constants']
        );
    },
    'configurations' => [
        'mariadb' => [
            'driver' => 'mysql',
            'dbname' => getenv('PHP_COMPACT_MARIADB_DB_NAME'),
            'host' => getenv('PHP_COMPACT_MARIADB_DB_HOST'),
            'port' => getenv('PHP_COMPACT_MARIADB_DB_PORT'),
            'user' => getenv('PHP_COMPACT_MARIADB_DB_USER'),
            'password' => getenv('PHP_COMPACT_MARIADB_DB_PASSWORD'),
            'constants' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        ],
    ],
];
