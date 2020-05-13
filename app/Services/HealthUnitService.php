<?php

namespace App\Services;

use App\Repositories\HealthUnitRepository;

class HealthUnitService extends EloquentService
{

    private $healthUnitRepository;

    /**
     * HealthUnitService constructor.
     * @param healthUnitRepository $healthUnitRepository
     */
    public function __construct(HealthUnitRepository $healthUnitRepository)
    {
        $this->healthUnitRepository = $healthUnitRepository;
        parent::__construct($healthUnitRepository);
    }


}
