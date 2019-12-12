<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|unique:contacts,email',
            'zip' => 'numeric|max:2147483648',
            'phone' => 'min:6',
            'avatar' => 'required|image|max:5000',
            'note'  => 'required|min:50'
        ];
    }

    /**
     * @return array of custom messages
     */
    public function messages()
    {
        return [
            'avatar.max' => "Max image size is 5mb.",
        ];
    }
}
