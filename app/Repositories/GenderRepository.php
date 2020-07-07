<?php

namespace App\Repositories;

use App\Models\Gender;

class GenderRepository extends EloquentRepository
{

    public function __construct(Gender $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){

        return $this->model->select('id', 'name')->get();

    }

}
