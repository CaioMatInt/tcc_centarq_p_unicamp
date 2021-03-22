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

    public function getHistoryOfMedicalAppointmensByUserId($id)
    {
        return \DB::select("SELECT m.date, m.frequency_type, m.observations, m.created_at, u.name as userName, s.name as createdByUserName, h.name as healthUnitName,
        group_concat(DISTINCT c.name separator ',') as medicalAppointmentComplaints, group_concat(DISTINCT cp.name separator ',') as medicalAppointmentConductionPoints
        FROM medical_appointments as m
		INNER JOIN users as s ON m.created_by_user_id=s.id
        INNER JOIN health_units as h ON m.health_unit_id=h.id
        INNER JOIN medical_appointment_complaints as mac ON m.id = mac.medical_appointment_id
        INNER JOIN complaints as c ON mac.complaint_id = c.id
        INNER JOIN medical_appointment_conduction_point as macp ON m.id = macp.medical_appointment_id 
        INNER JOIN conduction_points as cp ON macp.conduction_point_id = cp.id 
        INNER JOIN users as u ON m.user_id=u.id
        WHERE m.user_id = ?
        group by m.id, m.frequency_type, m.observations, m.created_at, u.name, s.name, h.name, m.date", [$id]);

    }


    public function getLastMedicalAppointments($total_of_appointments)
    {
        return \DB::select("SELECT m.date, m.frequency_type, m.observations, m.created_at, u.name as userName, s.name as createdByUserName, h.name as healthUnitName,
        group_concat(DISTINCT c.name separator ',') as medicalAppointmentComplaints, group_concat(DISTINCT cp.name separator ',') as medicalAppointmentConductionPoints
        FROM medical_appointments as m 
        INNER JOIN users as u ON m.user_id=u.id
        INNER JOIN users as s ON m.created_by_user_id=s.id
        INNER JOIN health_units as h ON m.health_unit_id=h.id
        INNER JOIN medical_appointment_complaints as mac ON m.id = mac.medical_appointment_id
        INNER JOIN complaints as c ON mac.complaint_id = c.id
        INNER JOIN medical_appointment_conduction_point as macp ON m.id = macp.medical_appointment_id 
        INNER JOIN conduction_points as cp ON macp.conduction_point_id = cp.id group by m.id, m.frequency_type, m.observations, m.created_at, u.name, s.name, h.name, m.date
        LIMIT ?", [$total_of_appointments]);

    }


    public function getListWithANumberOfAppointmentsWithRelatioships($number_of_appointments, $relationships){

            return $this->model->with($relationships)->take($number_of_appointments)->get();

    }

}
