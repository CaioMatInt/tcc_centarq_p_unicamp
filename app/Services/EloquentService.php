<?php


namespace App\Services;


abstract class EloquentService
{
    protected $repository;


    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function renderList()
    {
        return $this->repository->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function renderEdit($id)
    {
        return $this->repository->getById($id);

    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function buildUpdate($id, $data)
    {
        $this->repository->update($id, $data);

    }

    /**
     * @param $data
     * @return mixed
     */
    public function buildInsert($data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function buildDelete($id)
    {
        return $this->repository->delete($id);
    }

}
