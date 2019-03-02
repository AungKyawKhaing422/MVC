<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 3:57 PM
 */

namespace App\Models;


use App\Core\DBWrapper;

class User extends DBWrapper
{
    protected $table = "posts";
    protected $fillable=['name','role','password'];

  public function post($id){
      return $this->hasMany("posts","creater_id",$id);
  }
}