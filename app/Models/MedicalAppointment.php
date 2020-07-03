<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $health_unit_id
 * @property string $observations
 * @property string $created_at
 * @property string $updated_at
 * @property HealthUnit $healthUnit
 * @property User $user
 * @property MedicalAppointmentComplaint[] $medicalAppointmentComplaints
 * @property MedicalAppointmentConductionPoint[] $medicalAppointmentConductionPoints
 */
class MedicalAppointment extends Model
{
    public $timestamps = true;
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'health_unit_id', 'observations', 'created_at', 'created_by_user_id', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function healthUnit()
    {
        return $this->belongsTo('App\Models\HealthUnit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function medicalAppointmentComplaints()
    {
        return $this->belongsToMany('App\Models\Complaint', 'medical_appointment_complaints', 'medical_appointment_id', 'complaint_id')->withTimestamps();
    }


    public function medicalAppointmentConductionPoints()
    {
        return $this->belongsToMany('App\Models\ConductionPoint', 'medical_appointment_conduction_point', 'medical_appointment_id', 'conduction_point_id')->withTimestamps();
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:m:s');
    }
}
