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

    // 数据筛选
    public function filter($request)
    {
        return $this->when(($request->isRecommend || $request->isRecommend == '0'), function ($q) use ($request) {
            return $q->where('recommend', $request->isRecommend);
        })
        ->when($request->catagory, function ($q) use ($request) {
            return $q->whereHas('catagories', function ($q1) use ($request) {
                $q1->where('catagory.id', $request->catagory);
            });
        });
    }
}
