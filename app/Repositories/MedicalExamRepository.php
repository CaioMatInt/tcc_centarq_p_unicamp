<?php

namespace App\Repositories;

use App\Models\MedicalExam;


class MedicalExamRepository extends EloquentRepository
{

    /**
     * MedicalExamRepository constructor.
     * @param MedicalExam $model
     */

    public function __construct(MedicalExam $model)
    {
        parent::__construct($model);
    }

}
