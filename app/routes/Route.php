<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 9:33 AM
 */

namespace App\Routes;


use App\Controllers\User;

class Route
{
    private $currentclass = "User";
    private $currentmethod = "login";
    private $params = [];

    public function __construct()
    {
        self::loadUrl();
    }

    public function loadUrl()
    {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
        $urlAry = explode('/', $url);
        if (!empty($urlAry[0])) {
            if (file_exists(APP_ROOT . "/controllers/" . ucfirst($urlAry[0]) . ".php")) {
                $this->currentclass = $urlAry[0];
                unset($urlAry[0]);
            }
        }
        $class = new User();
        if (!empty($urlAry[1])) {
            if (method_exists($class, $urlAry[1])) {
                $this->currentmethod = $urlAry[1];
                unset($urlAry[1]);
            }
        }
        $params = array_values($urlAry);
        call_user_func(["App\Controllers\\" . $this->currentclass, $this->currentmethod], $params);
    }
}