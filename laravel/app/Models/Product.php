<?php

namespace App\Models;

class Product extends Model
{
    public $timestamps = false;

    protected $table = 'product';

    public $casts = [
        'type' => 'array',
        'video_poster' => 'array',
        'video_node' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function catagories()
    {
        return $this->belongsToMany(Catagory::class, 'product_catagory');
    }
}
