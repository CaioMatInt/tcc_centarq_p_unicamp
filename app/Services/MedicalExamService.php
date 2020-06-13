<?php

namespace App\Services;

use App\Repositories\MedicalExamRepository;

class MedicalExamService extends EloquentService
{

    private $medicalExamRepository;
    private $fileUploadService;

    /**
     * MedicalExamService constructor.
     * @param medicalExamRepository $medicalExamRepository
     */
    public function __construct(MedicalExamRepository $medicalExamRepository, FileUploadService $fileUploadService)
    {
        $this->medicalExamRepository = $medicalExamRepository;
        parent::__construct($medicalExamRepository);
        $this->fileUploadService = $fileUploadService;
    }

    public function buildInsert($data)
    {
        $data['path'] = $this->fileUploadService->uploadMedicalExam($data['exam'], $data['user_id']);
        $medicalExamPersistance =  $this->medicalExamRepository->create($data);

        return $medicalExamPersistance;
    }


}
