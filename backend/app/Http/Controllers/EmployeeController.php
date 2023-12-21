<?php

namespace App\Http\Controllers;

use App\Contracts\Services\EmployeeServiceInterface;
use Illuminate\Http\JsonResponse;

class EmployeeController extends APIController
{
    public function index(EmployeeServiceInterface $vehicleService): JsonResponse
    {
        return $this->respondWithSuccess(
            $vehicleService->listEmployees()
        );
    }

    public function show(int $id, EmployeeServiceInterface $vehicleService): JsonResponse
    {
        return $this->respondWithSuccess(
            $vehicleService->showEmployee($id)
        );
    }
}
