<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  //指定连接的数据表
  protected $table='cart';
  //定义主键Id
  protected $primaryKey='cart_id';
  //自定义时间戳
  const CREATED_AT = 'create_time';
  const UPDATED_AT = 'update_time';

}
