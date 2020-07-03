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

        return $this->repository->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function buildUpdate($id, $data)
    {
        $data['created_by_user_id'] = auth()->user()->id;

        try {
            $d = $this->medicalAppointmentRepository->update($id, $data);
        }catch(\Exception $e){
            dd($e, 1);
        }

    }

    public function renderComplaintsForSelect2($id)
    {
        return $this->repository->getComplaintsForSelect2($id);
    }


}
