<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  //指定连接的数据表
  protected $table='category';
  //定义主键Id
  protected $primaryKey='cate_id';
  //自定义时间戳
  const CREATED_AT = 'create_time';
  const UPDATED_AT = 'update_time';

    public static function getGoods($id)
    {
//        if($id=0){
//            $data=self::where('cate_show','=',1)->take(7)->get();
//        }else{
//            $data=self::where(['cate_show'=>1,'category'=>$id])->take(7)->get();
//        }
//        return $data;


    }


}
