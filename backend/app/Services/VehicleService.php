<?php

namespace App\Services;

use App\Contracts\Repositories\VehicleRepositoryInterface;
use App\Contracts\Services\VehicleServiceInterface;

class VehicleService implements VehicleServiceInterface
{
    public function __construct(protected VehicleRepositoryInterface $vehicleRepository)
    {
    }

    public function listVehicles(): array
    {
        return [
            'vehicles' => $this->vehicleRepository->index()->toArray(),
        ];
    }

    public function showVehicle(int $id): array
    {
        return [
            'vehicle' => $this->vehicleRepository->byId($id)->toArray(),
        ];
    }
}
