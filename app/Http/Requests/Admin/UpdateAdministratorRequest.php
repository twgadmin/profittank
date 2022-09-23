<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdministratorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:32',
            'last_name'  => 'nullable|max:32',
            'phone'      => 'required|max:24',
            // 'email'      => 'required|email:strict,filter|max:128',
            'password'         => 'nullable|required_with:password_confirmation|min:8',
            'password_confirmation' => 'required_if:password,!==,""|same:password',
            // 'is_active'  => 'required'
        ];
    }
}
