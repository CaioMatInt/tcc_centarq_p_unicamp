<?php

namespace App\Repositories;

use App\Models\MedicalExam;

class MedicalExamRepository extends EloquentRepository
{

    public function __construct(MedicalExam $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {

        $persistance =  $this->model->create($data);

        $persistance->medicalExamConductionPoints()->sync($data['conductionPoints']);
        $persistance->medicalExamComplaints()->sync($data['complaints']);
        $persistance->medicalExamMedicalTreatments()->sync($data['medicalTreatments']);
 
    }


}
