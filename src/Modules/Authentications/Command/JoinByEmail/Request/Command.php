<?php

declare(strict_types=1);

namespace App\Modules\Authentications\Command\JoinByEmail\Request;

class Command
{
    public string $email = '';
    public string $password = '';
}