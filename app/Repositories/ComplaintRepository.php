<?php

namespace App\Repositories;

use App\Models\Complaint;

class ComplaintRepository extends EloquentRepository
{

    public function __construct(Complaint $model)
    {
        parent::__construct($model);
    }

    public function getAllWithOnlyNameAndID(){

        return $this->model->select('id', 'name')->get();

    }

}
