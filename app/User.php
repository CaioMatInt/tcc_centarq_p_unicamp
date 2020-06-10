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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctors()
    {
        return $this->hasMany('App\Doctor');
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
    public function userPersonalInformations()
    {
        return $this->hasMany('App\UserPersonalInformation');
    }

    /**
     * The roles that belong to the user.
     */
    public function userTypes()
    {
        return $this->belongsToMany(UserType::class, 'user_user_types');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersHealthUnits()
    {
        return $this->hasMany('App\UsersHealthUnit');
    }


    public function townHalls()
    {
        return $this->belongsToMany(TownHall::class, 'users_town_halls');

    }
}


