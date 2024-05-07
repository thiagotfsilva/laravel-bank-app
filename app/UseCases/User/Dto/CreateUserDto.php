<?php

namespace App\UseCases\User\Dto;

use DateTime;

class CreateUserDto
{
    public string $fullName;
    public string $email;
    public string $password;
    public string $documentId;
    public string $phoneNumber;
    public DateTime $birthDate;
}
