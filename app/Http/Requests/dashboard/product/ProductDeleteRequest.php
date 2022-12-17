<?php

namespace App\Http\Requests\dashboard\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductDeleteRequest extends FormRequest
{



    public function rules()
    {
        return [
           'id'=>'exists:products,id'
        ];
    }
}
