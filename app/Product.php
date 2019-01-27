<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(\App\Category::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
