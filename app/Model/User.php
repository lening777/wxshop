<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  //指定连接的数据表
  protected $table='user';
  //定义主键Id
  protected $primaryKey='user_id';
  //自定义时间戳
  public $timestamps = false;

}
