<?php

namespace App\Models;

class GiftCode extends Model
{
    public function status($val)
    {
        if ('unfreeze' == $val) {
            return $this->where(function ($q) {
                $q->whereNull('code_expire_time')
                    ->whereNull('deleted_at')
                    ->WhereNull('receive_time')
                    ->orWhereDate('code_expire_time', '>=', date('Y-m-d'));
            })
            ->where('code_status', '<>', 'used');
        } elseif ('used' == $val) {
            return $this->whereNotNull('receive_time')
                ->where('code_status', 'used');
        } elseif ('freeze' == $val) {
            return $this->whereNotNull('deleted_at');
        } elseif ('invalid' == $val) {
            return $this->where(function ($q) {
                $q->whereNotNull('code_expire_time')
                    ->whereNull('deleted_at')
                    ->whereNull('receive_time')
                    ->whereDate('code_expire_time', '<', date('Y-m-d'));
            });
        }
    }
}
