<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTownHall extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|',
            'ibge_city_id' => 'required|unique:cities|max:255',
            'image' => 'required|image|max:2048',
            'adminName' => 'required',
            'adminEmail' => 'required',
        ];
    }
}
