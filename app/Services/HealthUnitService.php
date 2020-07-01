<?php

namespace App\Services;

use App\Repositories\HealthUnitRepository;

class HealthUnitService extends EloquentService
{

    private $healthUnitRepository;
    private $objectArrayManipulationService;

    /**
     * HealthUnitService constructor.
     * @param healthUnitRepository $healthUnitRepository
     */
    public function __construct(HealthUnitRepository $healthUnitRepository, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->healthUnitRepository = $healthUnitRepository;
        parent::__construct($healthUnitRepository);
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfTownHallsWithIdAndRelatedCityName = $this->healthUnitRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfTownHallsWithIdAndRelatedCityName, 'id', 'name');
    }


}
