<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use QrCode;
use Config;
use App\Services\WechatService;
use App\Models\User;
use Overtrue\Socialite\SocialiteManager;
use Overtrue\Socialite\AccessToken;

class WechatController extends Controller
{
    public function getWechatCode()
    {
        // EasyWechat授权登录
        $url = action('Web\WechatController@getWechatLogin');
        // Socialit第三方管理登录
        // $url = action('Web\WechatController@getLogin');
        $code = QrCode::size(200)->generate($url);

        return view('web.wechat.wechat_qrcode', compact('code'));

        // $callback = urlencode('http://16e01e61.ngrok.io/web/wechat/login');
        // $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='. env('WECHAT_APP_ID').'&redirect_uri='. $callback . '&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect';
        // $code = QrCode::size(200)->generate($url);

        // return view('web.wechat.wechat_qrcode', compact('code'));
    }

    // Socialit第三方登录组件
    public function getLogin()
    {
        $cfg = Config::get('services.wechat');
        $config = [
            'wechat' => [
                'client_id' => $cfg['appid'],
                'client_secret' => $cfg['appsecret'],
                'redirect' => action('Web\WechatController@getSocialCallback'),
            ],
        ];
        $socialite = new SocialiteManager($config);

        return $socialite->driver('wechat')->scopes(['snsapi_userinfo'])->redirect();
    }

    // Socialit第三方登录回调方法
    public function getSocialCallback()
    {
        $cfg = Config::get('services.wechat');
        $config = [
            'wechat' => [
                'client_id' => $cfg['appid'],
                'client_secret' => $cfg['appsecret'],
                'redirect' => action('Web\WechatController@getSocialCallback'),
            ],
        ];
        $socialite = new SocialiteManager($config);
        $user = $socialite->driver('wechat')->user();
        // 用户基本信息
        $basic = $user->getOriginal();
        // token access_token 信息
        $tokenInfo = $user->token;
        dd($basic, $tokenInfo);
    }

    // EasyWeChat授权登录
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
