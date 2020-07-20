<?php

declare(strict_types=1);

namespace App\Modules\Authentications\Command\JoinByEmail\Request;

use App\Modules\Authentications\Entity\User\Email;
use App\Modules\Authentications\Entity\User\Id;
use App\Modules\Authentications\Entity\User\User;
use App\Modules\Authentications\Entity\User\UserRepository;
use App\Modules\Authentications\Service\PasswordHasher;
use App\Modules\Authentications\Service\Tokenizer;
use DateTimeImmutable;
use DomainException;

class Handler
{
    private UserRepository $users;
    private PasswordHasher $hasher;
    private Tokenizer $tokenizer;

    public function __construct(
        UserRepository $users,
        PasswordHasher $hasher,
        Tokenizer $tokenizer
    ) {
        $this->users = $users;
        $this->hasher = $hasher;
        $this->tokenizer = $tokenizer;
    }

    public function handle(Command $command): void
    {
        $email = new Email($command->email);

        if ($this->users->hasByEmail($email)) {
            throw new DomainException('User already exists.');
        }

        $date = new DateTimeImmutable();

        $user = User::requestJoinByEmail(
            Id::generate(),
            $date,
            $email,
            $this->hasher->hash($command->password),
            $token = $this->tokenizer->generate($date)
        );

        $this->users->add($user);
    }
}