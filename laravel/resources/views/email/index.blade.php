@extends('web.components.layout')

@section('body')
<div style="padding-left: 20px; padding-top: 20px;">
  你好，你所注册的账号是{{ $account }} 验证码是{{ $code }}
</div>
@stop
