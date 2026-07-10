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

    public function likes()
    {
        return $this->hasMany(Like::class);
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

}
