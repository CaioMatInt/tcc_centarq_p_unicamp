<?php

namespace App\Repositories;

use App\Models\HealthUnit;


class HealthUnitRepository extends EloquentRepository
{

    /**
     * HealthUnitRepository constructor.
     * @param HealthUnit $model
     */

    public function __construct(HealthUnit $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){

        return $this->model->select('id', 'name')->get();

    }
}
