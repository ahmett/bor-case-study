<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthenticationServiceInterface;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthenticationController extends APIController
{
    public function login(LoginRequest $loginRequest, AuthenticationServiceInterface $authenticationService): JsonResponse
    {
        return $this->respondWithSuccess(
            $authenticationService->loginUser($loginRequest)
        );
    }

    public function logout(Request $request, AuthenticationServiceInterface $authenticationService): JsonResponse
    {
        return $this->respondWithSuccess(
            $authenticationService->logoutUser($request)
        );
    }
}
