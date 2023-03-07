<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            'first_name' => 'required|max:190',
            'last_name' => 'required|max:190',
            'email' => 'required|email:filter|max:160|unique:users,email,'.$this->route('staff')->id,
            'contact' => 'required|numeric',
            'password' => 'nullable|same:password_confirmation|min:6',
            'gender' => 'required',
            'role' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'contact.required' => 'Contact Number field is required',
        ];
    }
}
