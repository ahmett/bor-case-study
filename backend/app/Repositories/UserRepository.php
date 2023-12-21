<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected User $user)
    {
    }

    public function byEmail(string $email): ?User
    {
        return $this->user->where('email', $email)->first();
    }
}
