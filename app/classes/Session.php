<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 10:12 PM
 */

namespace App\Classes;


class Session
{
    public static function set($key, $value)
    {
        if (self::check($key)) {
            $_SESSION[$key] = $value;
        }
    }

    public static function check($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function remove($key)
    {
        if (self::check($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function replace($key, $value)
    {
        self::remove($key);
        self::set($key, $value);
    }

    public static function get($key)
    {
        if (self::check($key)) {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function flash($key, $value = "")
    {
        if (!empty($value)) {
            self::set($key, $value);
        } else {
            echo self::get($key);
            self::remove($key);
        }
    }
}