<?php

namespace App\Services;

use App\Contracts\Repositories\EmployeeRepositoryInterface;
use App\Contracts\Services\EmployeeServiceInterface;

class EmployeeService implements EmployeeServiceInterface
{
    public function __construct(protected EmployeeRepositoryInterface $employeeRepository)
    {
    }

    public function listEmployees(): array
    {
        return [
            'employees' => $this->employeeRepository->index()->toArray(),
        ];
    }

    public function showEmployee(int $id): array
    {
        return [
            'employee' => $this->employeeRepository->byId($id)->toArray(),
        ];
    }
}
