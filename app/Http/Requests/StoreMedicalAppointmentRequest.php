<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMedicalAppointmentRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'date' => 'required|date',
            'observations' => 'nullable|max:1000',
            'frequency_type' => 'required',
            'user_id' => 'required|exists:users,id',
            'health_unit_id' => 'required|exists:health_units,id',
            'complaints' => 'required|array|min:1',
            "complaints.*"  => "required|distinct|min:1|exists:complaints,id",
            'conductionPoints' => 'required|array|min:1',
            "conductionPoints.*"  => "required|distinct|min:1|exists:conduction_points,id",
        ];
    }
}
