<?php

namespace App\Services;

use App\Repositories\MedicalAppointmentRepository;

class MedicalAppointmentService extends EloquentService
{

    private $medicalAppointmentRepository;

    /**
     * MedicalAppointmentService constructor.
     * @param MedicalAppointmentRepository $medicalAppointmentRepository
     */
    public function __construct(MedicalAppointmentRepository $medicalAppointmentRepository)
    {
        $this->medicalAppointmentRepository = $medicalAppointmentRepository;
        parent::__construct($medicalAppointmentRepository);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function buildInsert($data)
    {
        $data['created_by_user_id'] = auth()->user()->id;

        return $this->medicalAppointmentRepository->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function buildUpdate($id, $data)
    {
        $data['created_by_user_id'] = auth()->user()->id;

        return $this->medicalAppointmentRepository->update($id, $data);

    }

    public function renderHistoryOfMedicalAppointmensByUserId($id)
    {

        $medicalAppointments = $this->medicalAppointmentRepository->getHistoryOfMedicalAppointmensByUserId($id);

        //Transform the concatenated strings (by group_concat) in arrays

        foreach($medicalAppointments as $key => $medicalAppointment){

            if($medicalAppointment->medicalAppointmentComplaints) {
                $medicalAppointments[$key]->medicalAppointmentComplaints = explode(",", $medicalAppointment->medicalAppointmentComplaints);
            }
            if($medicalAppointment->medicalAppointmentConductionPoints) {
                $medicalAppointments[$key]->medicalAppointmentConductionPoints = explode(",", $medicalAppointment->medicalAppointmentConductionPoints);
            }
        }

        return $medicalAppointments;
    }

    public function renderLastMedicalAppointments($total_of_appointments)
    {
        return $this->medicalAppointmentRepository->getLastMedicalAppointments($total_of_appointments);
    }


    public function renderListWithANumberOfAppointmentsWithRelatioships($number_of_appointments, $relationships)
    {
        return $this->medicalAppointmentRepository->getListWithANumberOfAppointmentsWithRelatioships($number_of_appointments, $relationships);
    }

}
