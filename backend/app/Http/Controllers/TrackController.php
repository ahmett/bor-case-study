<?php

namespace App\Http\Controllers;

use App\Contracts\Services\TrackServiceInterface;
use App\Http\Requests\TrackRequest;
use Illuminate\Http\JsonResponse;

class TrackController extends APIController
{
    public function index(TrackServiceInterface $trackService): JsonResponse
    {
        return $this->respondWithSuccess(
            $trackService->listTracks()
        );
    }

    public function store(TrackRequest $trackRequest, TrackServiceInterface $trackService): JsonResponse
    {
        return $this->respondWithSuccess(
            $trackService->storeTrack($trackRequest)
        );
    }

    public function show(int $id, TrackServiceInterface $trackService): JsonResponse
    {
        return $this->respondWithSuccess(
            $trackService->showTrack($id)
        );
    }

    public function update(int $id, TrackRequest $trackRequest, TrackServiceInterface $trackService): JsonResponse
    {
        return $this->respondWithSuccess(
            $trackService->updateTrack($id, $trackRequest)
        );
    }

    public function destroy(int $id, TrackServiceInterface $trackService): JsonResponse
    {
        return $this->respondWithSuccess(
            $trackService->deleteTrack($id)
        );
    }
}
