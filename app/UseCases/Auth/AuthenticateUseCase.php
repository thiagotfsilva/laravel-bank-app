<?php

namespace App\UseCases\Auth;

use App\Exceptions\AppErrorException;

class AuthenticateUseCase
{
    public function execute(string $email, string $password)
    {
        $credentials = ['email' => $email, 'password' => $password];
        $token = auth()->attempt($credentials);

        if (!$token) {
            throw new AppErrorException();
        }

        return $token;
    }
}
