<?php

namespace App\Services;

use App\Repositories\MedicalExamTypeRepository;

class MedicalExamTypeService extends EloquentService
{

    private $medicalExamTypeRepository;
    private $objectArrayManipulationService;

    /**
     * MedicalExamTypeService constructor.
     * @param medicalExamTypeRepository $medicalExamTypeRepository
     */
    public function __construct(MedicalExamTypeRepository $medicalExamTypeRepository, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->medicalExamTypeRepository = $medicalExamTypeRepository;
        parent::__construct($medicalExamTypeRepository);
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfMedicalTypesWithIdAndName = $this->medicalExamTypeRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfMedicalTypesWithIdAndName, 'id', 'name');

    }

}
