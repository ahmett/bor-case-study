<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GenericRepositoryInterface
{
    public function index(): Collection;

    public function byId(int $ID): ?Model;

    public function store(Model $model): bool;

    public function update(int $ID, array $data): bool;

    public function delete(int $ID): bool;
}
