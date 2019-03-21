<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\goods;
use App\Model\category;
use App\Model\user;
use App\Common;
class LoginController extends Controller
{
    public function index()
    {
        //查询商品表的所有数据
        $data = Goods::where('is_hot',1)->get();
        //获取顶级分类
        $cate = Category::where('pid',0)->get();
        //首页
        return view('index',['data'=>$data],['cate'=>$cate]);
    }
    //登录
    public function Login(){

        return view('login');

    }
    //注册
    public function register(){
     //发送短信
     //$this->sendMobile($mobile=15035825284);
     //测试有没有存session
     //dd(session('createcode'));die;
        return view('register');
    }
    //登录执行
    public function logindo(Request $request)
    {
     $user_tel=$request->user_tel;
     $user_pwd=$request->user_pwd;
     $code=$request->code;
     $codes=session('Logincode');
//     echo $code;
//     echo $user_tel;
//     echo $user_pwd;die;
     if($codes!=$codes){
         echo 1;die;
     }

     $arr=User::where('user_tel',$user_tel)->first()->toArray();
     $pwd=decrypt($arr['user_pwd']);
     //print_r($pwd);die;
//     print_r($arr);die;
        if(!empty($arr)){
            session(['user_id'=>$arr['user_id']]);
            echo 3;
        }else{
            echo 4;
        }




    }

     //注册执行方法
    public function registerdo(Request $request)
    {
        $user_tel=$request->user_tel;
        $user_pwd=$request->user_pwd;
        $code=$request->code;
//        dd($user_tel);die;
        if($user_tel!=session('user_tel')){
            echo 1;die;
        }
        if($code!=session("verifycode")){
            echo 3;die;
        }
        $user_pwds = encrypt($user_pwd);

        $model = new User();
        $model->user_tel = $user_tel;
        $model->user_pwd = $user_pwds;
        $model->user_code = $code;
        $res = $model->save();

        if($res){
            echo 4;
        }else{
            echo 5;
        }
    }
   //发送手机号验证码
    public function phone(Request $request)
    {
        $mobile = $request->user_tel;
        $res = $this->sendMobile($mobile);
//        dd($mobile);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    //短信验证
    public function sendMobile($mobile)
    {
        $host =env("MOBILE_HOST");
        $path = env("MOBILE_PATH");
        $method = "POST";
        $appcode = env("MOBILE_APPCODE");
        $time=time();
        $headers = array();
        $code=Common::createcode(4);
        session(['verifycode'=>$code,'user_tel'=>$mobile,'time'=>$time]);
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：".$code."，3分钟内有效！&mobile=".$mobile;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        return curl_exec($curl);

    }
}
