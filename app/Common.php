<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
        //随机生成一个验证码
        public static function createcode($len)
        {
            $code='';
            for($i=1;$i<=$len;$i++){
                $code .=mt_rand(0,9);
            }
            return $code;
        }
}