<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//大悦城路由
//首页
Route::any('index/index',"IndexController@index");
Route::any('shop/shopcart/{id?}',"ShopController@shopcart")->middleware('logs');
Route::any('user/userpage',"ShopController@userpage")->middleware('logs');
Route::any('shop/allshops/{id?}',"ShopController@allshops");

Route::any('shop/shopcontent/{id?}',"ShopController@shopcontent");
Route::any('shop/buyrecord',"ShopController@buyrecord");
Route::any('shop/address',"ShopController@address");
Route::any('shop/invite',"ShopController@invite");
Route::any('shop/mywallet',"ShopController@mywallet");
//登录成功后 首页
route::any('/index','loginController@index');
//登录静态页面
Route::any('/login',"loginController@login");
//登录执行
Route::post('/logindo',"loginController@logindo");
//注册静态页面
Route::any('/register',"loginController@register");
//注册执行
Route::any('/registerdo',"loginController@registerdo");
Route::post('index/shopAjax',"shopController@shopAjax");
//手机发送短信验证码
Route::any('index/phone',"loginController@phone");


Route::any('verify/create',"CaptchaController@create");
//商品排序
route::post('shop/ishot',"shopController@ishot");
route::post('shop/isnew',"shopController@isnew");
route::post('shop/price',"shopController@price");

//购物车页面路由组
Route::prefix('shop')->group(function (){
    route::post('cartadd','shopController@cartadd');
    route::get('shopcart/{id?}','shopController@shopcart')->middleware('logs');
});

