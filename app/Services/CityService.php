<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService extends EloquentService
{

    private $cityRepository;

    /**
     * CityService constructor.
     * @param cityRepository $cityRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
        parent::__construct($cityRepository);
    }

}
