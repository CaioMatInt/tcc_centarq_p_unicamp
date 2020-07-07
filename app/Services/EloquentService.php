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
     * Expect a array of specific relationships. Example: ['user', healthUnit']
     * @return mixed
     */
    public function renderListWithRelationships($relationships)
    {
        return $this->repository->getAllWithRelationships($relationships);
    }

    /**
     * @return mixed
     */
    public function renderPaginated($records_by_page)
    {
        return $this->repository->getAllPaginated($records_by_page);
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
     * @return mixed
     */
    public function renderEditWithRelationships($id, $relationships)
    {
        return $this->repository->getByIdWithRelationships($id, $relationships);

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

    public function renderTotal(){
        return $this->repository->getTotal();
    }

}
