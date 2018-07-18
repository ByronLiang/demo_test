<?php

namespace App\Models;

use Cache;
// use App\Models\Traits\ISO8601TimeFormat;
use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    // use ISO8601TimeFormat;
    protected $guarded = ['id'];

    // 获取当前模型缓存
    public static function getCachedAll($json = false)
    {
        $key = get_called_class();
        $data = Cache::get($key);
        if (! $data) {
            $data = static::select('id as value', 'name as label')
                ->orderBy('id')
                ->get();
            Cache::put($key, $data, 24 * 60);
        }

        return $json ? json_encode($data) : $data;
    }

    // 更新模型缓存
    public static function updateCachedAll()
    {
        $key = get_called_class();
        Cache::forget($key);
        $data = static::select('id as value', 'name as label')
                ->orderBy('id')
                ->get();
        Cache::put($key, $data, 24 * 60);

        return $data;
    }
}
