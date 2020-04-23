<?php

namespace App\Repositories;

use App\Models\TownHall;


class TownHallRepository extends EloquentRepository
{

    /**
     * TownHallRepository constructor.
     * @param TownHall $model
     */

    public function __construct(TownHall $model)
    {
        parent::__construct($model);
    }


    public function getAllWithCityRelation(){
        return $this->model->with('city')->get();
    }

}
