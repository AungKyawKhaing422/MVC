<?php

namespace App\Controllers;


use App\Core\BaseController;

class User extends BaseController
{
    public function login($params)
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $request = new Request();
            if (RequestValidation::unquie("name", $request->all()->post->email, "users")) {
                echo "user already exist with this email";
            } else {
                echo $request->all()->post->email;
            };
            $validate = new RequestValidation();
            var_dump($validate->isEmail($request->all()->post->email, 22));


        } else {
            $user = new \App\Models\User();
            $users = $user->all();
            $obj = [
                "users" => $users,
                "params" => $params
            ];
            $obj = json_decode(json_encode($obj));
            self::view("login", $obj);
        }

    }
    public function welcome(){
        echo "i am index";
    }

}