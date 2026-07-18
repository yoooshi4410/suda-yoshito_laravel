<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

   
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }


    public function getOwnProduct($user_id)
    {
        $products=$this->where('user_id',$user_id)->get();

        return $products;
    }

    public function getOtherProduct($user_id, $keyword = null, $min_price = null, $max_price = null)
    {
        $query=$this->where('user_id','!=',$user_id);

        if (!empty($keyword)) {
            $query->where('product_name','like','%'.$keyword.'%');
        }

        if (!empty($min_price)) {
            $query->where('price','>=',$min_price);
        }

        if (!empty($max_price)) {
            $query->where('price','<=',$max_price);
        }

        return $query->get();
    }

    //いいねとのリレーションを定義
    public function likes()
    {
        //1つのブログに対して「いいね」は複数(多)
        return $this->hasMany(Like::class);
    }

    //特定のユーザーがその商品に対して「いいね」をしているかどうかを確認
    public function likedBy(User $user)
    {
        //特定のユーザーが現在の商品に対して「いいね」しているか確認し、
        //現在の商品に関する「いいね」のリレーションを返却する
        return $this->likes()->where('user_id',$user->id)->exists();
    }

    public function getPurchasedProducts($user_id)
    {
        return $this
            ->join('sales','products.id','=','sales.product_id')
            ->where('sales.user_id',$user_id)
            ->select('products.*','sales.quantity')
            ->orderBy('sales.created_at')
            ->get();
    }

    

}
