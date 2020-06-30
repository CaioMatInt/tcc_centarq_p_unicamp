<?php

namespace App\Services;

use App\Repositories\ConductionPointRepository;

class ConductionPointService extends EloquentService
{

    private $conductionPointRepository;

    /**
     * ConductionPointService constructor.
     * @param conductionPointRepository $conductionPointRepository
     */
    public function __construct(ConductionPointRepository $conductionPointRepository)
    {
        $this->conductionPointRepository = $conductionPointRepository;
        parent::__construct($conductionPointRepository);
    }


}
