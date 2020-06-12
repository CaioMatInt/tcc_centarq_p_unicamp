<?php

namespace App\Repositories;

use App\User;

class UserRepository extends EloquentRepository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function getRGAndIdByLikeRG($rg)
    {
        return $this->model->select(['id', 'rg'])->where('RG', 'like', '%' . $rg . '%')->get();
    }


}
