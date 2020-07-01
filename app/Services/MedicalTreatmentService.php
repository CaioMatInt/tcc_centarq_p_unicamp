<?php

namespace App\Services;

use App\Repositories\MedicalTreatmentRepository;

class MedicalTreatmentService extends EloquentService
{

    private $medicalTreatmentRepository;
    private $objectArrayManipulationService;

    /**
     * MedicalTreatmentService constructor.
     * @param medicalTreatmentRepository $medicalTreatmentRepository
     */
    public function __construct(MedicalTreatmentRepository $medicalTreatmentRepository, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->medicalTreatmentRepository = $medicalTreatmentRepository;
        parent::__construct($medicalTreatmentRepository);
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfMedicalTreatmentsWithIdAndRelatedCityName = $this->medicalTreatmentRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfMedicalTreatmentsWithIdAndRelatedCityName, 'id', 'name');
    }

}
