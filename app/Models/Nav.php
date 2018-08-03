<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Nav extends Model
{
   protected $fillable=['name','pid','url','permission_id'];

    public function children()
    {
        return $this->hasMany(Nav::class, 'pid');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

}
