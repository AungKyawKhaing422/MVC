<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 10:10 AM
 */

namespace App\Controllers;

use App\Core\BaseController;

class Home extends BaseController
{
    public function welcome()
    {
        echo self::view();
    }
    public function show(){
    }

}