<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/1/2019
 * Time: 9:30 AM
 */

namespace App\Core;


class Database
{
    private static $con;

    private function __construct()
    {
        $dhs = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $options = [
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];
        try {
            self::$con = new \PDO($dhs, DB_USER, DB_PASS, $options);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getCon()
    {
        if (self::$con == null) {
            new Database();
        }
        return self::$con;
    }
}