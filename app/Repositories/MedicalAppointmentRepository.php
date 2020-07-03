<?php

namespace App\Repositories;

use App\Models\MedicalAppointment;
use Illuminate\Support\Facades\DB;

class MedicalAppointmentRepository extends EloquentRepository
{

    public function __construct(MedicalAppointment $model)
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

        $persistance->medicalAppointmentConductionPoints()->sync($data['conductionPoints']);
        $persistance->medicalAppointmentComplaints()->sync($data['complaints']);

        return $persistance;

    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $persistance =  $this->model->find($id);

        $persistance->medicalAppointmentConductionPoints()->sync($data['conductionPoints']);
        $persistance->medicalAppointmentComplaints()->sync($data['complaints']);
        $persistance->update($data);

        return $persistance;
    }


}
