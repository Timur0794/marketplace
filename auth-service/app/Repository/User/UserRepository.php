<?php

namespace App\Repository\User;

use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
