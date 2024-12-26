<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'string|required',
            'email' => 'email|required|unique:users,email,' . $this->id,
            'phone' => 'string|required|unique:users,phone,' . $this->id,
            'password' => 'required',
            'confirm_password' => 'same:password|required',
            'password' => 'nullable',
            'confirm_password' => 'same:password',
        ];
    }
}
