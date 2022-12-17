<?php

namespace App\Http\Requests\dashboard\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductDeleteImagesRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'exists:prod_image,id'
        ];
    }
}
