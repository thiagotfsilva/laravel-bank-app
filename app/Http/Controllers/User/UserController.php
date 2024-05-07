<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\UseCases\Account\CreateAccountUseCase;
use App\UseCases\User\CreateUserUseCase;

class UserController extends Controller
{
    public function register(CreateUserRequest $request)
    {
        $createUser = new CreateUserUseCase(new CreateAccountUseCase());
        $user = $createUser->execute($request->data());
        return response()->json($user);
    }
}
