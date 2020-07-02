<?php

namespace App\Services;

use App\Repositories\UserTypeRepository;

class UserTypeService extends EloquentService
{

    private $userTypeRepository;
    private $objectArrayManipulationService;

    /**
     * UserTypeService constructor.
     * @param userTypeRepository $userTypeRepository
     */
    public function __construct(UserTypeRepository $userTypeRepository, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->userTypeRepository = $userTypeRepository;
        parent::__construct($userTypeRepository);
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfTownHallsWithIdAndRelatedCityName = $this->userTypeRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfTownHallsWithIdAndRelatedCityName, 'id', 'name');
    }

}
