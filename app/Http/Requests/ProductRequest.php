<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'product_name' => 'required|max:255',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return[
            'product_name.required' => '商品名は必須です',
            'price.integer' => '価格は数字で入力してください',
            'stock.required' => '在庫数は必須です',
            'description.required' => '商品名は必須です'

        ];
    }



}
