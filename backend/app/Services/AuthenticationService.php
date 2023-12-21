<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\AuthenticationServiceInterface;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationService implements AuthenticationServiceInterface
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function loginUser(LoginRequest $request): array
    {
        $user = $this->userRepository->byEmail($request->email);

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return [
            'token' => $user->createToken('Personal Access Token')->plainTextToken,
        ];
    }

    public function logoutUser(Request $request): array
    {
        $request->user()->currentAccessToken()->delete();

        return [];
    }
}
