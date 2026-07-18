<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function account()
    {
        $user=Auth::user();

        return view('layouts.account_edit',compact('user'));
    }

     //ユーザー情報更新処理
     public function userupdate(Request $request)
     {
         $user=Auth::user();

         $validatedData=$request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255','unique:users,email,' . $user->id,
         ],
            'name_kanji'=>['required','string','max:255'],
            'name_kana'=>['required','string','max:255'],
        ]);
        $user->name=$validatedData['name'];
        $user->email=$validatedData['email'];
        $user->name_kanji=$validatedData['name_kanji'];
        $user->name_kana=$validatedData['name_kana'];
        $user->save();

        return redirect()
        ->route('mypage')->with('success','アカウント情報を更新しました');
     }
}
