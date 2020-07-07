<?php

namespace App\Services;

use App\Repositories\GenderRepository;

class GenderService extends EloquentService
{

    private $genderRepository;
    private $objectArrayManipulationService;

    /**
     * GenderService constructor.
     * @param genderRepository $genderRepository
     */
    public function __construct(GenderRepository $genderRepository, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->genderRepository = $genderRepository;
        parent::__construct($genderRepository);
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfTownHallsWithIdAndRelatedCityName = $this->genderRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfTownHallsWithIdAndRelatedCityName, 'id', 'name');
    }

}
