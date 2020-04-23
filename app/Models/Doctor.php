<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['user_id', 'crm'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
