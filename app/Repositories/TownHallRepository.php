<?php

namespace App\EverySystem\Repositories;

use App\EverySystem\Models\Cover;


class CoverRepository extends EloquentRepository
{


    /**
     * CoverRepository constructor.
     * @param Cover $model
     */
    public function __construct(Cover $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
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
        return $this->model->find($id)->fill($data)->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function coversByInsures($id){
        return $this->model->where('insurers_id',$id)->select('id','name')->get();
    }
}