<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalExam extends Model
{
    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['user_id', 'town_hall_id', 'medical_exam_type_id', 'path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicalExamType()
    {
        return $this->belongsTo('App\MedicalExamType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function townHall()
    {
        return $this->belongsTo('App\TownHall');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
