<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property MedicalExamMedicalTreatment[] $medicalExamMedicalTreatments
 */
class MedicalTreatment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalExamMedicalTreatments()
    {
        return $this->hasMany('App\MedicalExamMedicalTreatment');
    }

}
