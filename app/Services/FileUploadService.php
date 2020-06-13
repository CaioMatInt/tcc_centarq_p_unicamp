<?php

namespace App\Services;

use App\Repositories\TownHallRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * AdministratorService constructor.
     * @param TownHallRepository $TownHallRepository
     */
    public function __construct()
    {
        //
    }

    public function uploadMedicalExam($fileObject, $user_id)
    {
        try {
            $fileExtension   = $fileObject->getClientOriginalExtension();
            $fileName = 'exam_' . Str::random(5) . '_'.  $user_id . '.' .  $fileExtension;
            $fileObject->storeAs('public/medical_exams/', $fileName);

            return 'medical_exams/' . $fileName;

        }catch(\Exception $e){

            throw new \Exception('Failed to upload file, error: ' .  $e);
        }

    }

}
