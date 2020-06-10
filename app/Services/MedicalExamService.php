<?php

namespace App\Services;

use App\Repositories\MedicalExamRepository;

class MedicalExamService extends EloquentService
{

    private $medicalExamRepository;

    /**
     * MedicalExamService constructor.
     * @param medicalExamRepository $medicalExamRepository
     */
    public function __construct(MedicalExamRepository $medicalExamRepository)
    {
        $this->medicalExamRepository = $medicalExamRepository;
        parent::__construct($medicalExamRepository);
    }


}
