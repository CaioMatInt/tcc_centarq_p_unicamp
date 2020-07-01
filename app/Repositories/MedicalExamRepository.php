<?php

namespace App\Repositories;

use App\Models\MedicalExam;

class MedicalExamRepository extends EloquentRepository
{

    public function __construct(MedicalExam $model)
    {
        parent::__construct($model);
    }

}
