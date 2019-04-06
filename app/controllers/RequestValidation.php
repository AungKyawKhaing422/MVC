<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/4/2019
 * Time: 2:40 AM
 */

namespace App\Controllers;



use App\Core\DBHelper;

class RequestValidation

{
    private $error = [];
    private static $errorMessage = [
        'string' => 'the :attribute field cannot contain numbers!',
        'required' => 'the :attribute field is required',
        'minLength' => 'the :attribute field must be a minimum of :policy characters',
        'maxLength' => 'the :attribute field must be a maximum of :policy characters',
        'mixed' => 'the :attribute field can contain only letters,numbers,dash and space only',
        'number' => 'the :attribute field cannot contain letter e.g 20.2,43',
        'email' => 'Email address is not valid',
        'unique' => 'The :attribute is already taken, Please try another one!',
    ];

    public static function unquie($name, $value, $policy)
    {
        return DBHelper::unique($name, $value, $policy);
    }

    public static function required($value)
    {
        return empty($value) || $value == null ? false : true;
    }

    public static function minLength($value, $policy)
    {
        return strlen($value) > $policy ? true : false;
    }

    public static function maxLength($value, $policy)
    {
        return strlen($value) < $policy ? true : false;
    }

    public static function isEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function mixed($value)
    {
        return preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\}]+$/', $value);
    }

    public static function string($value)
    {
        return preg_match('/^[A-Za-z]+$/', $value);
    }

    public static function number($value)
    {
        return preg_match('/^[0-9]+$/', $value);
    }
}