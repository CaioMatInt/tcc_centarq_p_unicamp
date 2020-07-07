<?php

namespace App\Repositories;

use App\User;

class UserRepository extends EloquentRepository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getRGAndIdByLikeName($name)
    {
        return $this->model->select(['id', 'name'])->where('name', 'like', '%' . $name . '%')->get();
    }

}
