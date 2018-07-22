<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ action('Web\HomeController@getIndex') }}">Wechat Mall</a>
    </div>
    <div id="navbar" class="navbar-form navbar-right">
      @if (! auth()->check())
      <a type="button" class="btn btn-success"
          href="{{ action('Web\Auth\AuthController@getLogin') }}">注册/登录</a>
      @else
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{ $user->avatar }}" height="50px;" style="margin-left: -5px;">
            <span>{{ $user->nickname }}</span>
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="#">个人中心</a></li>
            <li><a href="#">消息</a></li>
            <li><a href="#">注销</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div>
      @endif
    </div>
  </div>
</nav>
