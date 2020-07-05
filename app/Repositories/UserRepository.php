<?php

namespace App\Repositories;

use App\User;

class UserRepository extends EloquentRepository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getRGAndIdByLikeName($name)
    {
        return $this->model->select(['id', 'name'])->where('name', 'like', '%' . $name . '%')->get();
    }

    public function getHistoryOfMedicalAppointmensByUserId($id)
    {
        return \DB::select("SELECT m.frequency_type, m.observations, u.name as paciente, s.name as criador,
        group_concat(DISTINCT c.name separator ',') as queixas, group_concat(DISTINCT cp.name separator ',') as pontos_de_conduta
        FROM medical_appointments as m INNER JOIN users as u ON m.user_id=u.id
        INNER JOIN users as s ON m.created_by_user_id=s.id
        INNER JOIN health_units as h ON m.health_unit_id=h.id
        INNER JOIN medical_appointment_complaints as mac ON m.id = mac.medical_appointment_id
        INNER JOIN complaints as c ON mac.complaint_id = c.id
        INNER JOIN medical_appointment_conduction_point as macp ON m.id = macp.medical_appointment_id 
        INNER JOIN conduction_points as cp ON macp.conduction_point_id = cp.id group by m.id");

    }

}
