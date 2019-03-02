<?php

namespace App\Controllers;


use App\Core\BaseController;

class User extends BaseController
{
    public function login($params)
    {

        if($_SERVER['REQUEST_METHOD'] =="POST"){
                $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                beautify($_POST);
                beautify($_FILES);
                beautify($_SERVER);
        }else{
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

}