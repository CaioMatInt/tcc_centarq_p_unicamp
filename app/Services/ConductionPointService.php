<?php

namespace App\Services;

use App\Repositories\ConductionPointRepository;

class ConductionPointService extends EloquentService
{

    private $conductionPointRepository;
    private $objectArrayManipulationService;

    /**
     * ConductionPointService constructor.
     * @param conductionPointRepository $conductionPointRepository
     */
    public function __construct(ConductionPointRepository $conductionPointRepository, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->conductionPointRepository = $conductionPointRepository;
        parent::__construct($conductionPointRepository);
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfConductionPointsWithIdAndRelatedCityName = $this->conductionPointRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfConductionPointsWithIdAndRelatedCityName, 'id', 'name');
    }

}
