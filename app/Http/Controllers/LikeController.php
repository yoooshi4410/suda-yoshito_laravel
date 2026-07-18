<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //いいねを追加する処理
    public function likeProduct(Request $request,Product $product)
    {
        $user = Auth::user();//現在ログインしているユーザーを取得

        //ユーザーが既にこの商品にいいねしているか確認
        if(!$product->likedBy($user)){
            //いいねしていなければ、likesテーブルに新しいレコードを作成
            Like::create([
                'product_id' => $product->id,//この商品のId
                'user_id' => $user->id,//ログインしているユーザーのId
            ]);
        }

        //そのブログに対する現在の「いいね」数を返す
        return response()->json([
            'likes_count' => $product->likes()->count(),
        ]);
    }

    //いいねを削除する処理
    public function unlikeProduct(Request $request,Product $product)
    {
        $user = Auth::user();//現在ログインしているユーザーを取得

        //ユーザーがこのブログに対していいねしているか確認
        if ($product->likedBy($user)){
            //いいねしていれば、likesテーブルからそのレコードを削除
            Like::where('product_id',$product->id)
                ->where('user_id',$user->id)
                ->delete();
        }

        //そのブログに対する現在のいいね数を返す
        return response()->json([
            'likes_count'=>$product->likes()->count(),
        ]);
    }
}
