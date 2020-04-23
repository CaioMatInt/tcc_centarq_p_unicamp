<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TownHall extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['city_id', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function healthUnits()
    {
        return $this->hasMany('App\HealthUnit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalExams()
    {
        return $this->hasMany('App\MedicalExam');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersHealthUnits()
    {
        return $this->hasMany('App\UsersHealthUnit', 'health_unit_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersTownHalls()
    {
        return $this->hasMany('App\UsersTownHall');
    }
}
