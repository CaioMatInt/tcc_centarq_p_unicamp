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

        $data = [
            'pageTitle' => 'Cadastro de' . $this->plural_name,
            'resources' => $this->TownHallRepository->getAll()
        ];

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function renderEdit($id)
    {
        $data = [
            'pageTitle' => 'Editar' . $this->name,
            'resource' => $this->TownHallRepository->getById($id)
        ];

        return $data;

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
