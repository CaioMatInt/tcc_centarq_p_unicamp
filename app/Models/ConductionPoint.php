<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class ConductionPoint extends Model
{
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalAppointmentConductionPoints()
    {
        return $this->hasMany('App\Models\MedicalAppointmentConductionPoint');
    }
}
