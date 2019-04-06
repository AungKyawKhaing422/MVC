<?php
/**
 * Created by PhpStorm.
 * User: Mr.Zero
 * Date: 3/5/2019
 * Time: 10:18 AM
 */

namespace App\Core;


class DBHelper
{
    public static function unique($name, $value, $policy)
    {
        $con = Database::getCon();
        $stmt = $con->prepare("SELECT * FROM $policy WHERE $name=:name");
        $stmt->bindParam(":name", $value);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $result ? true : false;
    }
}