<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGalleryRequest extends FormRequest
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
            'title' => 'required|unique:galleries,title|max:160',
            'images.*' => 'required|mimes:jpeg,png,jpg,webp,svg',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'images.*.mimes' => 'The images must be a file of type: jpeg, png, jpg, webp, svg.',
        ];
    }
}
