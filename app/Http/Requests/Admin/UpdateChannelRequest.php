<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChannelRequest extends FormRequest
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
            'channel_partner_id'       => 'required',
            'name'                     => 'required|max:65',
            'video_cover'              => 'required|file|mimes:jpeg,jpg,png|max:5000',
            'identifier'               => 'required|unique:channels,identifier,'.$this->channel.'|max:190',
            'user_completion_time'     => 'required|digits_between:1,3|numeric|gt:0',
            'estimate_turnaround_time' => 'required|digits_between:1,3|numeric|gt:0',
            'description'              => 'max:65535',
            'video_url'                => 'required||url|max:190',
            ];
    }
}
