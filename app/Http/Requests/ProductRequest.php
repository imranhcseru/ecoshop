<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sub_category_id' => 'required',
            'name' => 'required|max:191',
            'image' => 'required',
            'detail' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'admin_id' => 'required',
        ];
    }
}
