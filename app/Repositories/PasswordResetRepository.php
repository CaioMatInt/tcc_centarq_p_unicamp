<?php

namespace App\Repositories;

use App\Models\PasswordReset;

class PasswordResetRepository extends EloquentRepository
{

    public function __construct(PasswordReset $model)
    {
        parent::__construct($model);
    }


}
