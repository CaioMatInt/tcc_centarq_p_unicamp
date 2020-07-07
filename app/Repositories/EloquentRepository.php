<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    /**
     * @var Model
     */
    protected $model;


    /**
     * EloquentRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {

        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * Expect a array of specific relationships. Example: ['user', healthUnit']
     * @return mixed
     */
    public function getAllWithRelationships($relationships)
    {
        return $this->model->with($relationships)->get();
    }


    /**
     * @return mixed
     */
    public function getAllPaginated($records_per_page)
    {
        return $this->model->paginate($records_per_page);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Expect a array of specific relationships. Example: ['user', healthUnit']
     * @return mixed
     */
    public function getByIdWithRelationships($id, $relationships)
    {
        return $this->model->with($relationships)->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {

        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function getTotal(){
        return $this->model->get()->count();
    }
}
