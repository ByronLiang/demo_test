<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QrCode;
use Config;
use App\Services\WechatService;
use App\Models\User;

class WechatController extends Controller
{
    public function getWechatCode()
    {
        $url = action('Web\WechatController@getWechatLogin');
        $code = QrCode::size(200)->generate($url);

        return view('web.wechat.wechat_qrcode', compact('code'));

        // $callback = urlencode('http://16e01e61.ngrok.io/web/wechat/login');
        // $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='. env('WECHAT_APP_ID').'&redirect_uri='. $callback . '&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect';
        // $code = QrCode::size(200)->generate($url);

        // return view('web.wechat.wechat_qrcode', compact('code'));
    }

    public function getLogin()
    {
        if (isset($_GET['code'])) {
            echo $_GET['code'] . 'state=' . $_GET['state'];
        } else{
            echo "NO CODE";
        }
    }

    public function getWechatLogin()
    {
        $wechat = new WechatService();

        return $wechat->oauthRedirect();
    }

    public function getOauth()
    {
        $wechat = new WechatService();
        $userInfo = $wechat->oauthUser();
        $user = User::where('wechat_number', $userInfo->getId())
            ->first();
        if (! $user) {
            $user = User::create([
                'avatar' => $userInfo->getAvatar(),
                'name' => $userInfo->getName(),
                'wechat_number' => $userInfo->getId(),
                'api_token' => str_random(64),
            ]);
        }
        if ($user) {
            return view('web.wechat.home', compact('user'));
            // return redirect()->action('Web\HomeController@getIndex');
        } else {
            echo "Error";
        }
    }
}
