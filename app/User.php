<?php

namespace App;

use App\Models\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $timestamps = true;
    use Notifiable;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['name', 'image', 'email', 'email_verified_at', 'user_type_id', 'password', 'remember_token', 'created_at', 'updated_at', 'rg', 'gender_id', 'deleted_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType()
    {
        return $this->belongsTo('App\Models\UserType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalAppointments()
    {
        return $this->hasMany('App\Models\MedicalAppointment');
    }

    public function getImageAttribute($image)
    {
        return $image ? $image : 'images/common_user.png';
    }
}
