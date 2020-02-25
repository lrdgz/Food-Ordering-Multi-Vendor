<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterRequest extends FormRequest
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
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8'],
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'type'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email'         => 'You need to provide a unique email',
            'password'      => 'You need to provide a password',
            'first_name'    => 'You need to provide your first name',
            'last_name'     => 'You need to provide your last name'
        ];
    }
}
