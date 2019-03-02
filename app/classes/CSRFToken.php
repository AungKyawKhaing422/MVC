<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 10:39 PM
 */

namespace App\Classes;


class CSRFToken
{
    public static function _token()
    {
        if (Session::check("token")) {
            return Session::get("token");
        } else {
            $token = base64_encode(openssl_random_pseudo_bytes(16));
            Session::set("token", $token);
            return $token;
        }
    }

    public static function checkToken($token){
        if(Session::check($token)){
            Session::remove("token");
            return true;
        }else{
            return false;
        }
    }
}