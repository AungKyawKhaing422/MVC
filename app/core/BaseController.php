<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 11:23 PM
 */

namespace App\Core;


class BaseController
{
    public function view($name="index",$params=[]){
        require_once(APP_URL."/app/views/".$name.".php");
    }
}