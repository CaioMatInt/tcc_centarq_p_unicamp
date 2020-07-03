<?php

namespace App\Repositories;

use App\Models\ConductionPoint;

class ConductionPointRepository extends EloquentRepository
{

    public function __construct(ConductionPoint $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){

        return $this->model->select('id', 'name')->get();

    }

    //Return all medical_appointment related conductionPoints id's in a array

    public function getRelatedConductionPointsIdsArrayRelatedToAMedicalAppointment($medical_appointment_id){
        //The eloquent query below is equal to: SELECT id FROM `conduction_points` as c WHERE c.id IN (SELECT m.id FROM `medical_appointment_conduction_point`
        // as m WHERE `medical_appointment_id` = 1)

        $qConductionPointsIdsArray = $this->model->select('id');

        $qConductionPointsIdsArray->whereIn('id', function($q) use ($medical_appointment_id)
        {
            $q->from('medical_appointment_conduction_point')
                ->select('conduction_point_id')
                ->where('medical_appointment_id', '=', $medical_appointment_id);
        });


        $qConductionPointsIdsArray = $qConductionPointsIdsArray->get()->toArray();
        $formatedConductionPointsIdArray = [];

        foreach($qConductionPointsIdsArray as $conductionPointId){
            array_push($formatedConductionPointsIdArray, $conductionPointId['id']);
        }

        return $formatedConductionPointsIdArray;

    }
}
