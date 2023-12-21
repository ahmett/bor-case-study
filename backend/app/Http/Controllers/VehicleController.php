<?php

namespace App\Http\Controllers;

use App\Contracts\Services\VehicleServiceInterface;
use Illuminate\Http\JsonResponse;

class VehicleController extends APIController
{
    public function index(VehicleServiceInterface $vehicleService): JsonResponse
    {
        return $this->respondWithSuccess(
            $vehicleService->listVehicles()
        );
    }

    public function show(int $id, VehicleServiceInterface $vehicleService): JsonResponse
    {
        return $this->respondWithSuccess(
            $vehicleService->showVehicle($id)
        );
    }
}
