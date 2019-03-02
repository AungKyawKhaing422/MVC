<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 11:54 PM
 */

namespace App\Controllers;


use App\Core\BaseController;

class User extends BaseController
{
    public function login(){
        self::view("login");
    }

}