<?php

namespace App\Repositories;

use App\Models\Complaint;

class ComplaintRepository extends EloquentRepository
{

    public function __construct(Complaint $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){

        return $this->model->select('id', 'name')->get();

    }

    //Return all medical_appointment related complaints id's in a array

    public function getRelatedComplaintsIdsArrayRelatedToAMedicalAppointment($medical_appointment_id){
        //The eloquent query below is equal to: SELECT id FROM `complaints` as c WHERE c.id IN (SELECT m.id FROM `medical_appointment_complaints`
        // as m WHERE `medical_appointment_id` = 1)

        $qComplaintsIdsArray = $this->model->select('id');

        $qComplaintsIdsArray->whereIn('id', function($q) use ($medical_appointment_id)
        {
            $q->from('medical_appointment_complaints')
                ->select('complaint_id')
                ->where('medical_appointment_id', '=', $medical_appointment_id);
        });

        $qComplaintsIdsArray = $qComplaintsIdsArray->get()->toArray();

        $formatedComplaintsIdArray = [];

        foreach($qComplaintsIdsArray as $complaintId){
            array_push($formatedComplaintsIdArray, $complaintId['id']);

        }

        return $formatedComplaintsIdArray;

    }


}
