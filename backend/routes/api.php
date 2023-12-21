<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthenticationController::class, 'login'])->withoutMiddleware('auth:sanctum');
Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::apiResource('/tracks', TrackController::class);
Route::apiResource('/vehicles', VehicleController::class)->only(['index', 'show']);
Route::apiResource('/employees', EmployeeController::class)->only(['index', 'show']);
