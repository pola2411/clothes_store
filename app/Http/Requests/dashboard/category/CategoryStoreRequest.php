<?php

namespace App\Http\Requests\dashboard\category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'title'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'parent_id'=>'exists:categories,id|nullable'
        ];
    }
}
