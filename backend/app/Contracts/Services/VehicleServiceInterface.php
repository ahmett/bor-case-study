<?php

namespace App\Contracts\Services;

interface VehicleServiceInterface
{
    public function listVehicles(): array;

    public function showVehicle(int $id): array;
}
