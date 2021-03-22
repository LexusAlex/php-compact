<?php

declare(strict_types=1);

namespace Compact\Ci\Http\Response;

use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Response;

class HtmlResponse extends Response
{
    public function __construct($data ,int $status = 200)
    {
        parent::__construct(
            $status,
            null,
            (new StreamFactory())->createStream($data)
        );
    }
}
