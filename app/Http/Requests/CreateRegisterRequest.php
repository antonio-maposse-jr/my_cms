<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|max:190',
            'last_name'  => 'required|max:190',
            'email'      => 'required|max:160|email:filter|unique:users,email',
            'password'   => 'required|same:password_confirmation|min:6|max:190',
        ];

        return $rules;
    }
}
