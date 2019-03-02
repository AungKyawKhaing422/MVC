<?php

namespace App\Controllers;

use App\Core\BaseController;

class Home extends BaseController
{
    public function welcome($params)
    {
        self::view("index",$params);
    }
}