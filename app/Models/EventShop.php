<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventShop extends Model
{
    public function event()
    {
        return $this->hasOne(Event::class,'id','events_id');
    }

    public function shop()
    {
        return $this->hasOne(Shop::class,'id','shop_id');
    }
}
