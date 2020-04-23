<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPersonalInformation extends Model
{
    /**
     * @var array
     */

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['user_id', 'address_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
