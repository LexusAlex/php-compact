<?php

declare(strict_types=1);

namespace Compact\Ci\Http\Response;

use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Response;

class JsonResponse extends Response
{
    /**
     * JsonResponse constructor.
     * @param mixed $data
     * @param int $status
     */
    public function __construct($data, int $status = 200)
    {
        try {
            parent::__construct(
                $status,
                (new Headers(['Content-Type' => 'application/json'])),
                (new StreamFactory())->createStream(json_encode($data, JSON_THROW_ON_ERROR))
            );
        } catch (\JsonException $e) {
        }
    }
}
