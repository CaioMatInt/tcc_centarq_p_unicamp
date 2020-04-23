<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalExamType extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalExams()
    {
        return $this->hasMany('App\MedicalExam');
    }
}
