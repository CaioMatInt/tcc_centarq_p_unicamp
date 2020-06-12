<?php

namespace App\Services;

use App\Repositories\TownHallRepository;
use Illuminate\Support\Facades\DB;

class TownHallService extends EloquentService
{

    private $townHallRepository;
    private $cityService;
    private $imageUploadService;
    private $objectArrayManipulationService;

    /**
     * TownHallService constructor.
     * @param townHallRepository $townHallRepository
     */
    public function __construct(TownHallRepository $townHallRepository, CityService $cityService, ImageUploadService $imageUploadService, ObjectArrayManipulationService $objectArrayManipulationService)
    {
        $this->townHallRepository = $townHallRepository;
        parent::__construct($townHallRepository);
        $this->cityService = $cityService;
        $this->imageUploadService = $imageUploadService;
        $this->objectArrayManipulationService = $objectArrayManipulationService;
    }

    public function renderListWithCityRelation()
    {
        return $this->townHallRepository->getAllWithCityRelation();
    }

    public function buildInsert($data)
    {
            $dataTownHallToInsert['image'] = $this->imageUploadService->uploadTownHallImage($data['image'], $data['city_id']);
            $dataTownHallToInsert['city_id'] = $data['city_id'];
            $townHallPersistance =  $this->townHallRepository->create($dataTownHallToInsert);

            return $townHallPersistance;
    }

    public function renderArrayForSelectInputWithOnlyNameAndID()
    {
        $arrayOfTownHallsWithIdAndRelatedCityName = $this->townHallRepository->getAllWithOnlyNameAndID();

        return $this->objectArrayManipulationService->arrangeObjectToSelectInputComponent($arrayOfTownHallsWithIdAndRelatedCityName, 'id', 'name');
    }

}
