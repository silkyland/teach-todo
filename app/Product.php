<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
            'category_id'
        );
    }
}
