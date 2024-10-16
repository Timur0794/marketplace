<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $params): Model
    {
        return $this->model->create($params);
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function update(int $modelId, array $params): bool
    {
        $model = $this->find($modelId);

        return $model->update($params);
    }

    public function deleteByID(int $id): bool
    {
        return $model = $this->model->find($id)->delete();
    }

    public function firstOrCreate(array $params)
    {
        return $this->model->firstOrCreate($params);
    }

    public function updateOrCreate(array $updateParams, array $params)
    {
        return $this->model->updateOrCreate($updateParams, $params);
    }
}
