<?php

namespace App\Services;

use App\Repositories\MedicalExamTypeRepository;

class MedicalExamTypeService extends EloquentService
{

    private $medicalExamTypeRepository;

    /**
     * MedicalExamTypeService constructor.
     * @param medicalExamTypeRepository $medicalExamTypeRepository
     */
    public function __construct(MedicalExamTypeRepository $medicalExamTypeRepository)
    {
        $this->medicalExamTypeRepository = $medicalExamTypeRepository;
        parent::__construct($medicalExamTypeRepository);
    }

    public function renderListWithOnlyNameAndID()
    {
        return $this->medicalExamTypeRepository->getAllWithOnlyNameAndID();
    }

}
