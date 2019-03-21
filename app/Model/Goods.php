<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
  //指定连接的数据表
  protected $table='goods';
  //定义主键Id
  protected $primaryKey='goods_id';
  //自定义时间戳
  const CREATED_AT = 'create_time';
  const UPDATED_AT = 'update_time';

}
