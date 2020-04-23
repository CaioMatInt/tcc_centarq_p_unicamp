<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Mar 2019 16:52:47 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cover
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class TownHall extends Model
{
    protected $casts = [
        'insurers_id' => 'int'
    ];

    protected $fillable = [
        'name',
        'insurers_id'
    ];

    protected $with = ['insureer'];

    public function losses()
    {
        return $this->hasMany(Loss::class, 'covers_id');
    }

    public function insureer()
    {
        return $this->belongsTo(Insureer::class, 'insurers_id');
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtoupper($value);
    }
}
