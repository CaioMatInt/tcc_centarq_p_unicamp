<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Str;

class UserService extends EloquentService
{

    private $townHallAdminUserTypeId = 2;
    private $userRepository;

    /**
     * UserService constructor.
     * @param userRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct($userRepository);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function buildInsertTownHallAdmins($arrayOfAdminRG, $arrayOfAdminEmails, $arrayOfAdminNames, $townHallId)
    {

        foreach($arrayOfAdminEmails as $key => $adminEmail){
            $dataToInsert['email'] = $adminEmail;
            $dataToInsert['name'] = $arrayOfAdminNames[$key];
            $dataToInsert['rg'] = $arrayOfAdminRG[$key];
            $dataToInsert['image'] = '';
            $dataToInsert['password'] = bcrypt(Str::random(15));

            $insertedUser = $this->userRepository->create($dataToInsert);

            $insertedUser->userTypes()->withTimestamps()->sync([$this->townHallAdminUserTypeId]);
            $insertedUser->townHalls()->withTimestamps()->sync([$townHallId]);
        }

    }

}
