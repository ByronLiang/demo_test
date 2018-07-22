@extends('web.components.wechat_layout')

@section('body')
<div class="container" style="padding-top: 40px;padding-bottom: 40px; background-color: #eee;">
<form class="form-signin" style="max-width: 330px; margin: 0 auto; padding: 15px;">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a class="btn btn-success btn-block" type="button" href="{{ action('Web\WechatController@getWechatCode') }}">微信登录</a>
</form>

</div>
@stop
