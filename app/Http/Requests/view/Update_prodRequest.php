<?php

namespace App\Http\Requests\view;

use Illuminate\Foundation\Http\FormRequest;

class Update_prodRequest extends FormRequest
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
            'prod_id'=>'required',
           
               'quantity'=>'numeric'
        ];
    }
}
