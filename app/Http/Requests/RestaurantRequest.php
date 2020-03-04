<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'title' => 'required|min:6',
            'description' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'title' => 'The restaurant title is required and minimum of 6 characters',
            'description' => 'The restaurant description is required and minimum of 10 characters'
        ];
    }
}
