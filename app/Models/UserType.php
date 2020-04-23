<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userUserTypes()
    {
        return $this->hasMany('App\UserUserType');
    }
}
