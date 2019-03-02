<?php

namespace App\Controllers;


use App\Core\BaseController;

class User extends BaseController
{
    public function login($params)
    {
        $user=new \App\Models\User();
        $users=$user->all();
        $obj=[
            "users"=>$users,
            "params"=>$params
        ];
        $obj=json_decode(json_encode($obj));
        self::view("login", $obj);
    }

}