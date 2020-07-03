<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property MedicalAppointmentComplaint[] $medicalAppointmentComplaints
 */
class Complaint extends Model
{
    public $timestamps = true;
    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalAppointmentComplaints()
    {
        return $this->hasMany('App\Models\MedicalAppointmentComplaint');
    }
}
