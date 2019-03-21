<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Category;
class IndexController extends Controller
{
    //网站首页
    public function index(){
        //查询商品表中的数据
        $data=Goods::all();
        $cate=category::where('pid',0)->get();
        //dd($cate);die;
        return view("index",['data'=>$data],['cate'=>$cate]);
    }




}
