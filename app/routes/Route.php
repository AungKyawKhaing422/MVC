<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 9:33 AM
 */

namespace App\Routes;


class Route
{
    private $currentclass = "Home";
    private $currentmethod = "welcome";
    private $params = [];

    public function __construct()
    {
        self::loadUrl();
    }

    public function loadUrl()
    {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
        $urlary = explode('/', $url);
        if (!empty($urlary[0])) {
            $this->currentclass = $urlary[0];
            unset($urlary[0]);
        }
        if (!empty($urlary[1])) {
            $this->currentmethod = $urlary[1];
            unset($urlary[1]);
        }
        $params = array_values($urlary);
        call_user_func(["App\Controllers\\" . $this->currentclass, $this->currentmethod], $params);
    }
}