<?php

namespace App\Http\Controllers\User;

use App\Domain\User\UseCases\CreateUserUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
    public function register(CreateUserRequest $request)
    {
        $createUser = new CreateUserUseCase();
        $user = $createUser->execute($request->data());

        return response()->json($user);
    }
}
