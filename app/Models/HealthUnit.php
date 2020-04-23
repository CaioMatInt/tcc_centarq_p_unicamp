<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthUnit extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['town_hall_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function townHall()
    {
        return $this->belongsTo('App\TownHall');
    }
}
