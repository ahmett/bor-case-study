<?php

namespace App\Contracts\Services;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

interface AuthenticationServiceInterface
{
    public function loginUser(LoginRequest $request): array;

    public function logoutUser(Request $request): array;
}
