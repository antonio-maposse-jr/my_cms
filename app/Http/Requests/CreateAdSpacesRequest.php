<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateAdSpacesRequest extends FormRequest
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
            // 'ad_banner.1' => 'dimensions:width=350,height=290',
            // 'ad_banner.0' => 'dimensions:width=800,height=130',
        ];
    }

    public function messages()
    {
        return [
            'ad_banner.1.dimensions' => 'Mobile View image Dimensions must be 350X290 ',
            'ad_banner.0.dimensions' => 'Desktop View image Dimensions must be 800X130 ',
        ];
    }
}
