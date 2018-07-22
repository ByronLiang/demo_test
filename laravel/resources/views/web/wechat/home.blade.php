@extends('web.components.wechat_layout')
@section('head')
    @extends('web.components.head')
@stop
@section('body')
<div class="jumbotron">
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"
            style="width: 768px; height: 450px; margin: 0 auto;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/upload/1519045041282.jpg" alt="..." height="450px;">
                  <!-- <div class="carousel-caption">
                    ...
                  </div> -->
                </div>
                <div class="item">
                    <img src="/upload/1519045041282.jpg" alt="..." height="450px;">
                </div>
                <div class="item">
                    <div style="margin-left: 120px; padding-top: 30px;">
                        <video src="/upload/1520180276319.mp4" style="height: 360px; width: 558px;" controls="controls"></video>
                    </div>
                    <!-- <img src="/upload/1519045041282.jpg" alt="..." height="450px;"> -->
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" style="width: 90px;">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" style="width: 90px;">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@stop
