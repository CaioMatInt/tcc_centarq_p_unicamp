<?php

namespace App\Repositories;

use App\Models\ConductionPoint;

class ConductionPointRepository extends EloquentRepository
{

    public function __construct(ConductionPoint $model)
    {
        parent::__construct($model);
    }

}
