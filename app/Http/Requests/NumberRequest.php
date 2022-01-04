<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumberRequest extends FormRequest
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
            'first_name' => 'required', 'middle_name' => 'present', 'last_name' => 'required',
            'phone_number' => 'required', 'mobile_number' => 'present', 'birthday' => 'present', 'email' => 'present',
            'occupation' => 'present', 'url' => 'present', 'other_names' => 'present', 'notes' => 'present',
        ];
    }
}
