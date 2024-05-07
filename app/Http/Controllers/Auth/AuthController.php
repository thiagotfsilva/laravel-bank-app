<?php

namespace App\Http\Controllers\Auth;

use App\Domain\User\UseCases\AuthenticateUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthenticateRequest;

class AuthController extends Controller
{
    public function login(AuthenticateRequest $request)
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        /* $credentials = $request->data();
        $authUseCase = new AuthenticateUseCase();
        $token = $authUseCase->execute($credentials[0], $credentials[1]); */

        return response()->json([
            'success' => true,
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
