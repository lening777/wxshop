<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Category;
use App\Model\Cart;


class ShopController extends Controller
{
    //人气
    public function ishot(Request $request)
    {
        $goodInfo=Goods::where('is_hot',1)->get();
        return view('shopdiv',['goodsInfo'=>$goodInfo]);
    }
    //新品
    public function isnew(Request $request)
    {
        $goodInfo=Goods::where('is_new',1)->get();
        return view('shopdiv',['goodsInfo'=>$goodInfo]);
    }
    //价格
    public function price(Request $request)
    {
    $type=$request->type;
    if($type=='1'){
        $goodsInfo=Goods::orderby('self_price','ASC')->get();
    }else{
        $goodsInfo = Goods::orderby('self_price','DESC')->get();
    }
        return view('shopdiv',['goodsInfo'=>$goodsInfo]);
    }
    //购物车
    public function cartadd(Request $request){
        $goods_id=$request->goods_id;
        $user_id=session('user_id');
//        print_r($goods_id);
//        print_r($user_id);die;
        $cartmodel=new cart;
        $goodsmodel=new goods;
        $goodsInfo=$goodsmodel->where(['goods_id'=>$goods_id])->first();
        $arr=$cartmodel->where(['goods_id'=>$goods_id,'user_id'=>$user_id,'cart_status'=>1])->first();
        if(empty($arr)){
            if($goodsInfo->goods_num>=1){
                $data['goods_id']=$goods_id;
                $data['user_id']=$user_id;
                $data['buy_number']=1;
                $data['create_time']=time();
                $res = $cartmodel->insert($data);
                if($res){
                    echo json_encode(['font'=>"添加成功",'code'=>1]);exit;
                }else{
                    echo json_encode(['font'=>'添加失败','code'=>2]);exit;
                }
            }else{
                echo json_encode(['font'=>'库存不足','code'=>2]);exit;
            }
        }else{
            if($goodsInfo->goods_num > $arr->buy_number){
                $arr->buy_number = $arr->buy_number+1;
                $res = $arr->save();
                if($res){
                    echo json_encode(['font'=>"添加成功",'code'=>1]);exit;
                }else{
                    echo json_encode(['font'=>'添加失败','code'=>2]);exit;
                }
            }else{
                echo json_encode(['font'=>'库存不足','code'=>2]);exit;
            }
        }
    }


    /*
    * 购物车
    * */
    public function shopcart()
    {
        $cartmodel=new cart;
        $goodsmodel=new goods;
        $goodsinfo=$goodsmodel->where('is_hot',1)->get();
        $data=$cartmodel
            ->join('goods','cart.goods_id','=','goods.goods_id')
            ->where(['user_id'=>session('user_id'),'cart_status'=>1])
            ->orderBy('cart.create_time','desc')
            ->get();

        return view('shopcart',['data'=>$data],['goodsinfo'=>$goodsinfo]);

    }

    //我的潮购
    public function userpage(){
        return view('userpage');
    }
    //所有商品
    public function allshops($id)
    {
        //查询左侧分类信息
        $cateInfo=Category::get()->where('pid',0);
        if($id==0){
            //查询商品信息
            $goodsInfo=Goods::all();
        }else{
            //查询所有的分类信息
            $cateInfos=Category::all();
            //查询所有符合条件的分类ID
            $c_id=$this->getSonCateId($cateInfos,$id);
            //dump($c_id);die;
            //查询分类下的商品信息
            $goodsInfo=goods::where('is_up',1)->whereIn('cate_id',$c_id)->get();
            //dd($goodsInfo);die;
        }
           //dd($goodsInfo);exit;
           //$cateInfo=Category::all()->where('pid','=',0);
           //$Info=Category::getGoods($id);
           //dd($Info);die;
        return view('allshops',['goodsInfo'=>$goodsInfo],['cateInfo'=>$cateInfo]);
           //->with('goodsInfo',$goodsInfo);
    }
    //获取所有分类ID 递归
    public function getSonCateId($cateInfo,$pid){
        static $id=[];
        foreach($cateInfo as $k=>$v){
            if($v['pid']==$pid){
                $id[]=$v['cate_id'];
                $this->getSonCateId($cateInfo,$v['cate_id']);
            }
        }
        return $id;
    }
    public function shopAjax(Request $request)
    {
        //接受分类ID
        $cate_id=$request->cate_id;
        //
        //查询所有的分类信息
        $cateInfos=Category::all();
        //查询所有符合条件的分类ID
        $c_id=$this->getSonCateId($cateInfos,$cate_id);
        //dump($c_id);die;
        //查询分类下的商品信息
        $goodsInfo=goods::where('is_up',1)->whereIn('cate_id',$c_id)->get();
//            dd($goodsInfo);die;
        return view('shopdiv',['goodsInfo'=>$goodsInfo]);

    }
    //潮购记录kkk
    public function buyrecord(){
        return view('buyrecord');
    }
    //收获地址
    public function address(){
        return view('address');
    }
    //二维码
    public function invite(){
        return view('invite');
    }
    //我的钱包
    public function mywallet(){
        return view('mywallet');
    }
    //商品详情
    public function shopcontent($id)
    {
        $goodsInfo=Goods::where('goods_id',$id)->first();
//        dump($goodsInfo);die;
        $data=Goods::where('goods_id',$id)->first();
        $image=rtrim($data['goods_imgs'],'|');
        $imgs=Explode('|',$image);
        //dump($imgs);die;
        return view('shopcontent',['data'=>$data],['imgs'=>$imgs]);
    }



}
