<?php

namespace App\Contracts\Services;

use App\Http\Requests\TrackRequest;

interface TrackServiceInterface
{
    public function listTracks(): array;

    public function showTrack(int $id): array;

    public function storeTrack(TrackRequest $trackRequest): array;

    public function updateTrack(int $id, TrackRequest $trackRequest): array;

    public function deleteTrack(int $id): array;
}
