<?php

namespace App\Services;

use App\Contracts\Repositories\TrackRepositoryInterface;
use App\Contracts\Services\TrackServiceInterface;
use App\Http\Requests\TrackRequest;
use App\Models\Track;

class TrackService implements TrackServiceInterface
{
    public function __construct(protected TrackRepositoryInterface $trackRepository)
    {
    }

    public function listTracks(): array
    {
        // We could use resources & pagination to shape our response.
        // But this is demo, so it doesn't matter.
        return [
            'tracks' => $this->trackRepository->index()->toArray(),
        ];
    }

    public function showTrack(int $id): array
    {
        return [
            'track' => $this->trackRepository->byId($id)->toArray(),
        ];
    }

    public function storeTrack(TrackRequest $trackRequest): array
    {
        $track = new Track($trackRequest->validated());

        $this->trackRepository->store($track);

        return [];
    }

    public function updateTrack(int $id, TrackRequest $trackRequest): array
    {
        $this->trackRepository->update($id, $trackRequest->validated());

        return [];
    }

    public function deleteTrack(int $id): array
    {
        $this->trackRepository->delete($id);

        return [];
    }
}
