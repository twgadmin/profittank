<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'first_name'       => 'required|min:3|max:24',
            'email'            => 'required|email:strict,filter|unique:users|max:128',
            'last_name'        => 'nullable|min:3|max:24',
            'phone_num'        => 'nullable|min:3|max:24',
            'mobile_num'       => 'nullable|min:3|max:24',
            'company_name'     => 'nullable|min:3|max:24',
            'summary'          => 'nullable|min:3|max:64',
            'zip_code'         => 'nullable|min:3|max:24',
            'state'            => 'nullable|min:2|max:3',
            'city'             => 'nullable|min:3|max:24',
            'address_2'        => 'nullable|min:3|max:24',
            'address_1'        => 'nullable|min:3|max:24',
            'password'         => 'nullable|required_with:confirmed|min:8',
            'image'            => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'password'         => 'required|required_with:confirm_password|min:8',
            'confirm_password' => 'required_if:password,!==,""|same:password',
        ];
    }
}
