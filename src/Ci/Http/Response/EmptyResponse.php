<?php

declare(strict_types=1);

namespace Compact\Ci\Http\Response;

use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Response;

class EmptyResponse extends Response
{
    public function __construct(int $status = 204)
    {
        $resource = fopen('php://temp', 'rb');
        parent::__construct(
            $status,
            null,
            (new StreamFactory())->createStreamFromResource($resource)
        );
    }
}
