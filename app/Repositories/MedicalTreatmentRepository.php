<?php

namespace App\Repositories;

use App\Models\MedicalTreatment;

class MedicalTreatmentRepository extends EloquentRepository
{

    public function __construct(MedicalTreatment $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){

        return $this->model->select('id', 'name')->get();

    }

}
