<?php

namespace App\Services;

use App\Repositories\TownHallRepository;

class TownHallService
{

    private $TownHallRepository;
    public $plural_name = 'Prefeituras';
    public $name = 'Prefeitura';

    /**
     * AdministratorService constructor.
     * @param TownHallRepository $TownHallRepository
     */
    public function __construct(TownHallRepository $TownHallRepository)
    {
        $this->TownHallRepository = $TownHallRepository;
    }

    /**
     * @return mixed
     */
    public function renderList()
    {
        return $this->TownHallRepository->getAllWithCityRelation();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function renderEdit($id)
    {
        return $this->TownHallRepository->getById($id);

    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function buildUpdate($id, $data)
    {
        $this->TownHallRepository->update($id, $data);

    }

    /**
     * @param $data
     * @return mixed
     */
    public function buildInsert($data)
    {
        return $this->TownHallRepository->create($data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function buildDelete($id)
    {
        return $this->TownHallRepository->delete($id);
    }

}
