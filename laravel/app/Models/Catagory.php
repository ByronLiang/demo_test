<?php

namespace App\Models;

class Catagory extends Model
{
    public $timestamps = false;

    protected $table = 'catagory';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_catagory');
    }
}
