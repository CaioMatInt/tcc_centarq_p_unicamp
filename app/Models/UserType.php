<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name'];


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_user_types');
    }

}
