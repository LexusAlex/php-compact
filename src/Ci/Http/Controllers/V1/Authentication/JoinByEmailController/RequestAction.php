<?php

declare(strict_types=1);

namespace Compact\Ci\Http\Controllers\V1\Authentication\JoinByEmailController;

use Compact\Ci\Http\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RequestAction implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new EmptyResponse(201);
    }
}
