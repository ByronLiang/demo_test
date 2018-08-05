<?php

namespace App\Models;

use Log;
use Illuminate\Support\Facades\Cache;

class Author extends Model
{
    protected $table = 'authors';

    /*
    creating,  created, updating, updated, saving, saved, deleting, deleted, restoring, restored。
    新建模型会触发：creating，created。
    数据更新：updating，updated，同时也会触发saving，saved。
    删除数据：deleting，deleted。
    */
    protected static function boot()
    {
        parent::boot();
        // 监听模型的更新与添加事件
        static::saved(function ($author) {
            self::updateCachedAll();
        });
        // 删除数据：deleting，deleted 事件监听
        static::deleted(function($author) {
            self::updateCachedAll();
        });
    }

    public function room()
    {
        return $this->hasOne(AuthorChatRoom::class);
    }
}
