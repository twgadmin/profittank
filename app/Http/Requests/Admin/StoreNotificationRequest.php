<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotificationRequest extends FormRequest
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
            'from_id'           => 'required',
            'to_id'             => 'required',
            'notification_text' => 'required|max:65',
            'route'             => 'required|max:65',
            'route_value'       => 'required|max:65'
        ];
    }

    public function messages()
    {
        return [
            'from_id.required'           => "The 'from' field is required",
            'to_id'                      => "The 'to' field is required",
            'notification_text.required' => 'The notification text field is required',
            'route_value.required'       => 'The route value field is required'
        ];
    }
}
