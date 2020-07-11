<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property MedicalAppointment[] $medicalAppointments
 */
class HealthUnit extends Model
{
    public $timestamps = true;
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalAppointments()
    {
        return $this->hasMany('App\Models\MedicalAppointment');
    }
}
