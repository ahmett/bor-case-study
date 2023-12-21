<?php

namespace App\Contracts\Services;

interface EmployeeServiceInterface
{
    public function listEmployees(): array;

    public function showEmployee(int $id): array;
}
