<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/4/2019
 * Time: 2:42 AM
 */

namespace App\Controllers;


class Request
{
    public static function all()
    {
        $result = [];
        if (count($_GET) > 0) $result['get'] = $_GET;
        if (count($_POST) > 0) $result['post'] = $_POST;
        if (count($_FILES) > 0) $result['files'] = $_FILES;
        return $result = json_decode(json_encode($result));
    }
}