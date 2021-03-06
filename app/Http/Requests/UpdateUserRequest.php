<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|max:100|unique:users,name,' . $this->usuario,
            'cellphone' => 'nullable|max:25',
            'rg' => 'required|max:20|unique:users,rg,' . $this->usuario,
            'email' => 'required|email|max:100|unique:users,email,' . $this->usuario,
            'gender_id' => 'required|exists:genders,id',
            'user_type_id' => 'required|exists:user_types,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,wbep,ico,bmp,tif|max:10240',
        ];
    }
}
