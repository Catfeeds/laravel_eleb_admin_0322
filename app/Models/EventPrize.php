<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrize extends Model
{
    protected $fillable=['events_id','name','description','shop_id'];

    public function event()
    {
        return $this->hasOne(Event::class,'id','events_id');
    }

    public function shop()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }
}
