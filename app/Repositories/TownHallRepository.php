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
        return $this->model->with('city')->paginate(10);
    }

    public function getAllWithOnlyNameAndID(){

            return \DB::table('town_halls')
            ->join('cities', 'town_halls.city_id', '=', 'cities.id')
            ->select('town_halls.id', 'cities.name')
            ->get();

    }

}
