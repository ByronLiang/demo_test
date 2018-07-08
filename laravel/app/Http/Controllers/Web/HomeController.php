<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function getIndex()
    {
        // Cache::put('15626169416', '1234', 1);
        dd(Cache::get('15626169416'));
        return view('web.wechat.home');
    }
}
