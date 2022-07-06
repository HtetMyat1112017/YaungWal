<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name'=>'required|min:2|max:50',
            'product_full_price'=>'required|min:2|max:50',
            'product_half_price'=>'required|min:2|max:20',
            'product_weight'=>'required|min:2',
            'product_photo'=>'required',
            'product_description'=>'required|min:10',
            'category_id'=>'required',
            'user_id'=>'required',
        ];
    }
}
