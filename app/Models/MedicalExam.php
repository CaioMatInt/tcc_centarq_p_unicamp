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

    public function medicalExamComplaints()
    {
        return $this->belongsToMany('App\Models\Complaint', 'medical_exam_complaints', 'medical_exam_id', 'complaint_id');
    }


    public function medicalExamConductionPoints()
    {
        return $this->belongsToMany('App\Models\ConductionPoint', 'medical_exam_conduction_point', 'medical_exam_id', 'conduction_point_id');
    }

    public function medicalExamMedicalTreatments()
    {
        return $this->belongsToMany('App\Models\MedicalTreatment', 'medical_exam_medical_treatment', 'medical_exam_id', 'medical_treatment_id');
    }
}
