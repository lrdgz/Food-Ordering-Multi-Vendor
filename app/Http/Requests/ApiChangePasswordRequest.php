<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiChangePasswordRequest extends FormRequest
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
            'pin' => 'required|min:6|numeric',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'pin' => 'The 6 digit number is required',
            'password' => 'The password is required'
        ];
    }
}
