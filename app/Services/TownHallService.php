<?php

namespace App\Services;

use App\Repositories\TownHallRepository;
use Illuminate\Support\Facades\DB;

class TownHallService extends EloquentService
{

    private $townHallRepository;
    private $cityService;
    private $imageUploadService;

    /**
     * TownHallService constructor.
     * @param townHallRepository $townHallRepository
     */
    public function __construct(TownHallRepository $townHallRepository, CityService $cityService, ImageUploadService $imageUploadService)
    {
        $this->townHallRepository = $townHallRepository;
        parent::__construct($townHallRepository);
        $this->cityService = $cityService;
        $this->imageUploadService = $imageUploadService;
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

}
