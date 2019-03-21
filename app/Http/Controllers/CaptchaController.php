<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Captcha;

class CaptchaController extends Controller
{
    public function create()
    {
        $verify = new Captcha();
        $code = $verify->getCode();
        //var_dump($code);
        //登录时的验证码信息
        session(['Logincode'=>$code]);
        return $verify->doimg();


    }

}
