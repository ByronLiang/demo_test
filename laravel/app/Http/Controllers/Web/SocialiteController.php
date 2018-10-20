<?php

namespace App\Http\Controllers\Web;

use Overtrue\Socialite\SocialiteManager;
use Config;

class SocialiteController extends Controller
{
    public function index($type)
    {
        $cfg = Config::get('services.github');
        $config = [
            'github' => [
                'client_id' => $cfg['client_id'],
                'client_secret' => $cfg['client_secret'],
                'redirect' => action('Web\SocialiteController@handleGitHubCallback'),
            ],
        ];
        $socialite = new SocialiteManager($config);

        return $socialite->driver($type)->redirect();
    }

    public function handleGitHubCallback()
    {
        $cfg = Config::get('services.github');
        $config = [
            'github' => [
                'client_id' => $cfg['client_id'],
                'client_secret' => $cfg['client_secret'],
                'redirect' => action('Web\SocialiteController@handleGitHubCallback'),
            ],
        ];
        $socialite = new SocialiteManager($config);
        $user = $socialite->driver('github')->user();
        dd($user);
    }
}
