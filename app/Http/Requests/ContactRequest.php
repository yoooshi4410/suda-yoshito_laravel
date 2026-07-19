<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules()
    {
        //フォームバリデーションルールを定義
        return[
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'message'=>'required|string',
        ];
    }

    public function messaegs()
    {
        //各バリデーションルールに対するエラーメッセージ
        return[
            'name.required'=>'名前は必須です',
            'email.max'=>'名前は255文字以内で入力してください',
            'email.required'=>'Eメールは必須です',
            'email.max'=>'Eメールは255文字以内で入力してください',
            'message.required'=>'内容は必須です',
        ];
    }

}
