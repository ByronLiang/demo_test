@extends('web.components.wechat_layout')

@section('body')
<h1>你好，
    @if(isset($user))
        {{ $user->name }} <img src="{{ $user->avatar }}" height="50px;" />
    @else 游客 @endif</h1><br>
<a href="http://www.baidu.com">Baidu</a>
@stop
