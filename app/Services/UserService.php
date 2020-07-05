<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Str;

class UserService extends EloquentService
{

    private $userRepository;
    private $imageUploadService;

    /**
     * UserService constructor.
     * @param userRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, ImageUploadService $imageUploadService)
    {
        $this->userRepository = $userRepository;
        parent::__construct($userRepository);
        $this->imageUploadService = $imageUploadService;
    }

    public function renderJsonListWithRGAndIdByLikeName($name)
    {
        return $this->userRepository->getRGAndIdByLikeName($name);
    }

    public function renderHistoryOfMedicalAppointmensByUserId($id)
    {
        return $this->userRepository->getHistoryOfMedicalAppointmensByUserId($id);
    }



    /**
     * @param $data
     * @return mixed
     */
    public function buildInsert($data)
    {
        $userImageToUpload = $data['image'];

        $data['password'] = bcrypt(Str::random(15));
        /*Persist null image to firstly get the user ID*/
        $data['image'] = null;

        $userPersistance = $this->repository->create($data);


        $dataToUpdateImage['image'] = $this->imageUploadService->uploadUserImage($userImageToUpload, $userPersistance->id);

        self::buildUpdate($userPersistance->id, $dataToUpdateImage);

        return $userPersistance;

    }



}
