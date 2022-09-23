<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'plan_name'          => 'required|max:32',
            'sub_heading'        => 'required|max:32',
            'monthly_price'      => 'required|max:32',
            'additional_price'   => 'required|max:32',
            'description'        => 'required|max:65535',
            'short_description'  => 'required|max:65535',
            'detail_description' => 'required|max:65535'
        ];
    }
}
