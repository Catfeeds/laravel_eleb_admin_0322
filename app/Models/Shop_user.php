<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_user extends Model
{
  protected $fillable=['name','email','password','status','shop_id'];

    public function Shop()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }
}
