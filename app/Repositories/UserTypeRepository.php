<?php

namespace App\Repositories;

use App\Models\UserType;

class UserTypeRepository extends EloquentRepository
{

    public function __construct(UserType $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){

        return $this->model->select('id', 'name')->get();

    }

}
