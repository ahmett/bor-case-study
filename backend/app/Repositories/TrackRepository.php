<?php

namespace App\Repositories;

use App\Contracts\Repositories\TrackRepositoryInterface;
use App\Models\Track;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TrackRepository implements TrackRepositoryInterface
{
    public function __construct(protected Track $track)
    {
    }

    public function index(): Collection
    {
        return $this->track->with('vehicle', 'employee')->get();
    }

    public function byId(int $ID): ?Model
    {
        return $this->track->with('vehicle', 'employee')->findOrFail($ID);
    }

    public function store(Model $model): bool
    {
        return $model->saveOrFail();
    }

    public function update(int $ID, array $data): bool
    {
        return $this->track->findOrFail($ID)->update($data);
    }

    public function delete(int $ID): bool
    {
        return $this->track->findOrFail($ID)->delete();
    }
}
