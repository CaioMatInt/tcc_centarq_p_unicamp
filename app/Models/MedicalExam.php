<?php

namespace App\Models;

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
 * @property MedicalExamComplaint[] $medicalExamComplaints
 * @property MedicalExamConductionPoint[] $medicalExamConductionPoints
 */
class MedicalExam extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'health_unit_id', 'observations', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function healthUnit()
    {
        return $this->belongsTo('App\HealthUnit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalExamComplaints()
    {
        return $this->hasMany('App\MedicalExamComplaint');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalExamConductionPoints()
    {
        return $this->hasMany('App\MedicalExamConductionPoint');
    }
}
