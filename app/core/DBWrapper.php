<?php


namespace App\Core;


class DBWrapper
{
    private $db;
    protected $table;
    protected $fillable = [];
    private $stmt;

    public function __construct()
    {
        $this->db = Database::getCon();
    }

    public function all()
    {
        $this->stmt = $this->db->prepare("SELECT * FROM " . $this->table);
        $this->stmt->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findOne($key, $value)
    {
        $this->stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE " . $key . "=:" . $key);
        $this->stmt->bindParam(":" . $key, $value);
        $this->stmt->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $keys = "";
        foreach ($this->fillable as $fill) {
            $keys .= $fill . ",";
        }
        $keys = rtrim($keys, ',');
        $arys = explode(',', $keys);
        $bkeys = "";
        foreach ($arys as $ary) {
            $bkeys .= ":" . $ary . ",";
        }
        $bkeys = rtrim($bkeys, ',');

        $this->stmt = $this->db->prepare("INSERT INTO $this->table ($keys) VALUES ($bkeys)");
        for ($i = 0; $i < count($values); $i++) {
            $this->stmt->bindParam(":" . $this->fillable[$i], $values[$i]);
        }
        return $this->stmt->execute();
    }

    public function findAll($key, $value)
    {
        $this->stmt = $this->db->prepare("SELECT * FROM $this->table WHERE $key=:$key");
        $this->stmt->bindParam(":$key", $value);
        $this->stmt->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
        //return new static;
    }

    public function hasOne($joinTable, $foreign, $primary)
    {
        $this->stmt = $this->db->prepare("SELECT * FROM $joinTable WHERE $foreign=:$foreign");
        $this->stmt->bindParam(":" . $foreign, $primary);
        $this->stmt->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function hasMany($joinTable, $foreign, $primary)
    {
        $this->stmt = $this->db->prepare("SELECT * FROM $joinTable WHERE $foreign=:$foreign");
        $this->stmt->bindParam(":" . $foreign, $primary);
        $this->stmt->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function delete($key, $value)
    {
        $this->stmt = $this->db->prepare("DELETE FROM $this->table WHERE $key=:$key");
        $this->stmt->bindParam(":" . $key, $value);
        $this->stmt->execute();
    }

    public function update($values, $realKey, $realVal)
    {
        $pholder = "";
        foreach ($values as $key => $value) {
            $pholder .= $key . "=:" . $key . ",";
        }
        $pholder = rtrim($pholder, ",");
        $this->stmt = $this->db->prepare("UPDATE " . $this->table . " SET " . $pholder . " WHERE " . $realKey . "=:" . $realKey);
        foreach ($values as $k => $v) {
            $this->stmt->bindParam(":" . $k, $v);
        }
        $this->stmt->bindParam(":" . $realKey, $realVal);
        return $this->stmt->execute();
    }

}