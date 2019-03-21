<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <link rel="stylesheet" href="{{url('css/address.css')}}">
    <link rel="stylesheet" href="{{url('css/sm.css')}}">
    <link rel="stylesheet" href="{{url('layui/css/layui.css')}}">
    <link href="{{url('css/index.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/cartlist.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/member.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('css/mui.min_1.css')}}">
    <link href="{{url('css/goods.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/mywallet.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/fsgallery.css')}}" rel="stylesheet" charset="utf-8">
    <link rel="stylesheet" href="{{url('css/swiper.min.css')}}">
    <link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/vccode.css')}}" rel="stylesheet" type="text/css" />

</head>
<!--首页头部-->
<div class="m-block-header"  id="div-header">
    <strong id="m-title"></strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
    {{--<div class="search"></div>--}}
    {{--<a href="/" class="m-public-icon m-1yyg-icon"></a>--}}
</div>
@yield('content')
<script src="{{url('js/jquery-3.1.1.min.js')}}"></script>

<script src="{{url('layui/layui.js')}}"></script>
<script src="{{url('js/all.js')}}"></script>
<script src="{{url('js/index.js')}}"></script>
<script src="{{url('js/lazyload.min.js')}}"></script>
<script src="{{url('js/mui.min.js')}}"></script>
<script src="{{url('js/zepto.js')}}" charset="utf-8"></script>
<script src="{{url('js/sm.js')}}"></script>
<script src="{{url('js/sm-extend.js')}}"></script>
<script src="{{url('js/swiper.min.js')}}"></script>
<script src="{{url('js/photo.js')}}" charset="utf-8"></script>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/flexslider/2.6.2/jquery.flexslider.min.js"></script>
@yield('my-js')
