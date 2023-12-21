<?php

namespace App\Repositories;

use App\Contracts\Repositories\VehicleRepositoryInterface;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class VehicleRepository implements VehicleRepositoryInterface
{
    public function __construct(protected Vehicle $vehicle)
    {
    }

    public function index(): Collection
    {
        return $this->vehicle->all();
    }

    public function byId(int $ID): ?Model
    {
        return $this->vehicle->findOrFail($ID);
    }

    public function store(Model $model): bool
    {
        return $model->saveOrFail();
    }

    public function update(int $ID, array $data): bool
    {
        return $this->vehicle->findOrFail($ID)->update($data);
    }

    public function delete(int $ID): bool
    {
        return $this->vehicle->findOrFail($ID)->delete();
    }
}
