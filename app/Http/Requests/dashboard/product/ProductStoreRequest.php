<?php

namespace App\Http\Requests\dashboard\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cat_id'=>'exists:categories,id',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'title'=>'required|string',
            'description'=>'required',
            'main_price'=>'numeric',
            'main_desconde'=>'numeric',
            'colors'=>'nullable|array',
            'colors.*'=>'nullable|string',
            'sizes'=>'nullable|array',
            'sizes.*'=>'nullable|string',
            'images'=>'nullable|array',
            'images.*'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',

        ];
    }
}
