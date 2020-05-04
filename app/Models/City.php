<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name', 'ibge_city_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function townHalls()
    {
        return $this->hasMany('App\Models\TownHall');
    }
}
