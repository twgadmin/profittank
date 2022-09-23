<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'last_name'        => 'required|min:3|max:24',
            'phone_num'        => 'required|min:3|max:24',
            'company_name'     => 'required|min:3|max:24',
            'summary'          => 'nullable|min:3|max:64',
            'zip_code'         => 'required|min:3|max:24',
            'state'            => 'required',
            'city'             => 'required|min:3|max:24',
            'address_2'        => 'nullable|min:3|max:24',
            'address_1'        => 'required|min:3|max:24',
            'current_password' => 'nullable|required_with:password|min:8',
            'password'         => 'nullable|required_with:current_password|min:8',
            'image'            => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
        return [
            'state.required'           => "The state field is required",
        ];
    }
}
