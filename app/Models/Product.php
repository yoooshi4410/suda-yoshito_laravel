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

    public function getOtherProduct($user_id)
    {
        $products=$this->where('user_id','!=',$user_id)->get();

        return $products;
    }

}
