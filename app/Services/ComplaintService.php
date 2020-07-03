<?php

namespace App\Services;

use App\Repositories\ComplaintRepository;

class ComplaintService extends EloquentService
{

    private $complaintRepository;
    private $objectArrayManipulationService;

    /**
     * ComplaintService constructor.
     * @param complaintRepository $complaintRepository
     */
    public function __construct(ComplaintRepository $complaintRepository, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->complaintRepository = $complaintRepository;
        parent::__construct($complaintRepository);
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfTownHallsWithIdAndRelatedCityName = $this->complaintRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfTownHallsWithIdAndRelatedCityName, 'id', 'name');
    }
    
    public function renderRelatedConductionPointsIdsArrayRelatedToAMedicalAppointment($medical_appointment_id)
    {
        return $this->complaintRepository->getRelatedComplaintsIdsArrayRelatedToAMedicalAppointment($medical_appointment_id);
    }

}
