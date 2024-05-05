<?php

namespace App\Infrastructure\User;

use App\Domain\User\Dto\CreateUserDto;
use App\Domain\User\Entity\User;

interface UserRepositoryInterface
{
    public function create(CreateUserDto $user): User;
}
