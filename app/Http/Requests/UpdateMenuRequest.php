<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'title' => 'required|max:190|unique:menus,title,'.$this->route('menu')->id,
            'link' => 'required',
            'order' => 'nullable|numeric|min:1',
            //            'show_in_menu' => 'required',
        ];
    }
}
