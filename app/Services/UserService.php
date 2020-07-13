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

        $userPersistance = $this->userRepository->create($data);


        $imageToUpdate = $this->imageUploadService->uploadUserImage($userImageToUpload, $userPersistance->id);

        self::buildUpdateUserImage($userPersistance->id, $imageToUpdate);

        return $userPersistance;

    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function buildUpdate($id, $data)
    {
        if(isset($data['image'])) {

            $userImageToUpload = $data['image'];

            /*Persist null image to firstly get the user ID*/
            $data['image'] = null;

            $userPersistance = $this->userRepository->update($id, $data);


            $dataToUpdateImage['image'] = $this->imageUploadService->uploadUserImage($userImageToUpload, $id);


            $this->userRepository->update($id, $dataToUpdateImage);

        }else{
            $userPersistance = $this->userRepository->update($id, $data);
        }

        return $userPersistance;

    }


    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function buildUpdateUserImage($id, $image)
    {
        return $this->repository->update($id, ['image' => $image]);

    }



}
