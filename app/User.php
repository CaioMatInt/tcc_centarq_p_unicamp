<?php

namespace App;

use App\Models\TownHall;
use App\Models\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = ['name', 'image', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'rg'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType()
    {
        return $this->belongsTo('App\UserType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalExams()
    {
        return $this->hasMany('App\MedicalExam');
    }
}
