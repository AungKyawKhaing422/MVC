<?php

namespace App\Core;


class BaseController
{
    public function view($name="index",$params=[]){
        require_once(APP_URL."/app/views/".$name.".php");
    }
}