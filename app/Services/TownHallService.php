<?php

namespace App\Services;

use App\Repositories\TownHallRepository;

class TownHallService extends EloquentService
{

    private $townHallRepository;

    /**
     * TownHallService constructor.
     * @param townHallRepository $townHallRepository
     */
    public function __construct(TownHallRepository $townHallRepository)
    {
        $this->townHallRepository = $townHallRepository;
        parent::__construct($townHallRepository);
    }

    public function renderListWithCityRelation()
    {
        return $this->townHallRepository->getAllWithCityRelation();
    }

    public function buildInsert($data)
    {
        return $this->repository->create($data);
    }

}
