@extends('web.components.wechat_layout')

@section('body')
<div class="container">
    <div style="max-width: 330px; margin: 0 auto; padding: 15px;">
        {!! $code !!}
        <p>Scan me to return to the original page.</p>
    </div>
</div>
@stop
