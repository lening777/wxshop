    @extends('master')
	@section('title',"大悦城")
	@section('content')
		<body fnav="1" class="g-acc-bg">
		<div class="marginB" id="loadingPicBlock">

			<!--首页头部 end-->
			<!-- 关注微信 -->
			<div id="div_subscribe" class="app-icon-wrapper" style="display: none;">
				<div class="app-icon">
					<a href="javascript:;" class="close-icon"><i class="set-icon"></i></a>
					<a href="javascript:;" class="info-icon">
						<i class="set-icon"></i>
						<div class="info">
							<p>点击关注666潮人购官方微信^_^</p>
						</div>
					</a>
				</div>
			</div>
			<!-- 焦点图 -->
			<div class="hotimg-wrapper">
				<div class="hotimg-top"></div>
				<section id="sliderBox" class="hotimg">
					<ul class="slides" style="width: 600%; transition-duration: 0.4s; transform: translate3d(-828px, 0px, 0px);">
						<li style="width: 414px; float: left; display: block;" class="clone">
							<a href="http://weixin.1yyg.com/v27/products/23559.do?pf=weixin">
								<img src="https://a.vpimg2.com/upload/flow/2019/01/10/96/15471082012813.jpg" alt="">
							</a>
						</li>
					</ul>
				</section>
			</div>
			<!--分类-->
			<div class="index-menu thin-bor-top thin-bor-bottom">
				<ul class="menu-list">
                 @foreach ($cate as $v)
					<li>
						<a href="{{url('shop/allshops')}}/{{$v->cate_id}}" id="btnAllGoods">
							<i class="fenlei"></i>
							<span class="title">{{$v->cate_name}}</span>
						</a>
					</li>
                 @endforeach
				</ul>
			</div>
			<!--商品列表-->
			<div class="goods-wrap marginB">
				<ul id="ulGoodsList" class="goods-list clearfix">
					@foreach($data as $v)
					<li id="23558" codeid="12751965" goodsid="23558" codeperiod="28436">
						<a href="{{url('shop/shopcontent')}}/{{$v->goods_id}}" class="g-pic">
							<img class="lazy" name="goods_img" src="{{url('image/goodsimg')}}/{{$v->goods_img}}" width="136" height="136">
						</a>
						<p class="g-name">(第<em>28436</em>潮)中国黄金 财富投资金条 Au9999 5g</p>
						<ins class="gray9">价值：￥{{$v->self_price}}</ins>
						<div class="Progress-bar">
							<p class="u-progress">
            				<span class="pgbar" style="width: 96.43076923076923%;">
            					<span class="pging"></span>
            				</span>
							</p>
						</div>
						<div class="btn-wrap" name="buyBox" limitbuy="0" surplus="58" totalnum="1625" alreadybuy="1567">
							<a href="javascript:;" class="buy-btn" codeid="12751965">立即潮购</a>
							<div class="gRate" codeid="12751965" canbuy="58">
								<a href="javascript:;"></a>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
				<div class="loading clearfix"><b></b>正在加载</div>
			</div>
		</div>
		<!--底部-->
		<div class="footer clearfix">
			<ul>
				<li class="f_home"><a href="{{url('index/index')}}" class="hover"><i></i>潮购</a></li>
				<li class="f_announced"><a href="{{url('shop/allshops')}}/0" ><i></i>所有商品</a></li>
				<li class="f_single"><a href="{{url('index/index')}}" ><i></i>嘿！</a></li>
				<li class="f_car"><a id="btnCart" href="{{url('shop/shopcart')}}" ><i></i>购物车</a></li>
				<li class="f_personal"><a href="{{url('user/userpage')}}" ><i></i>我的潮购</a></li>
			</ul>
		</div>
		<div id="div_fastnav" class="fast-nav-wrapper">
			<ul class="fast-nav">
				<li id="li_menu" isshow="0">
					<a href="javascript:;"><i class="nav-menu"></i></a>
				</li>
				<li id="li_top" style="display: none;">
					<a href="javascript:;"><i class="nav-top"></i></a>
				</li>
			</ul>
			<div class="sub-nav four" style="display: none;">
				<a href=""><i class="announced"></i>嘿！</a>
				<a href="/v44/post/index.do"><i class="single"></i>晒单</a>
				<a href="#"><i class="personal"></i>我的潮购</a>
				<a href="{{url('./shopcate')}}"><i class="shopcar"></i>购物车</a>
			</div>
		</div>
		</body>
	@endsection
	@section('my-js')
		<script>
			$(function () {
				$('.hotimg').flexslider({
					directionNav: false,   //是否显示左右控制按钮
					controlNav: true,   //是否显示底部切换按钮
					pauseOnAction: false,  //手动切换后是否继续自动轮播,继续(false),停止(true),默认true
					animation: 'slide',   //淡入淡出(fade)或滑动(slide),默认fade
					slideshowSpeed: 3000,  //自动轮播间隔时间(毫秒),默认5000ms
					animationSpeed: 150,   //轮播效果切换时间,默认600ms
					direction: 'horizontal',  //设置滑动方向:左右horizontal或者上下vertical,需设置animation: "slide",默认horizontal
					randomize: false,   //是否随机幻切换
					animationLoop: true   //是否循环滚动
				});
				setTimeout($('.flexslider img').fadeIn());
			});
			jQuery(document).ready(function() {
				$("img.lazy").lazyload({
					placeholder : "",
					effect: "fadeIn",
				});
				// 返回顶部点击事件
				$('#div_fastnav #li_menu').click(
						function(){
							if($('.sub-nav').css('display')=='none'){
								$('.sub-nav').css('display','block');
							}else{
								$('.sub-nav').css('display','none');
							}
						}
				)
				$("#li_top").click(function(){
					$('html,body').animate({scrollTop:0},300);
					return false;
				});

				$(window).scroll(function(){
					if($(window).scrollTop()>200){
						$('#li_top').css('display','block');
					}else{
						$('#li_top').css('display','none');
					}
				})
			});
		</script>
		<script type="text/javascript">
			$("#div-header").attr("style","display:none")
		</script>
    @endsection




   

