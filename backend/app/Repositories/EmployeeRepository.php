<?php

namespace App\Repositories;

use App\Contracts\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function __construct(protected Employee $employee)
    {
    }

    public function index(): Collection
    {
        return $this->employee->all();
    }

    public function byId(int $ID): ?Model
    {
        return $this->employee->findOrFail($ID);
    }

    public function store(Model $model): bool
    {
        return $model->saveOrFail();
    }

    public function update(int $ID, array $data): bool
    {
        return $this->employee->findOrFail($ID)->update($data);
    }

    public function delete(int $ID): bool
    {
        return $this->employee->findOrFail($ID)->delete();
    }
}
