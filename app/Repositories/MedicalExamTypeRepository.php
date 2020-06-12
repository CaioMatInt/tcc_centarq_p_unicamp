<?php

namespace App\Repositories;

use App\Models\MedicalExamType;


class MedicalExamTypeRepository extends EloquentRepository
{

    /**
     * MedicalExamTypeRepository constructor.
     * @param MedicalExamType $model
     */

    public function __construct(MedicalExamType $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){
        return $this->model->select('id', 'name')->get();
    }

}
