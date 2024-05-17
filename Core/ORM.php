<?php

class ORM
{
    public static $database;

    #CREATE
    public function create($table, $fields)
    {
        self::$database->query("INSERT INTO $table (" . implode(", ", array_flip($fields)) . ")
         VALUES (\"" . implode("\", \"", array_values($fields)) . "\")");
        return self::$database->lastInsertId();
    }
    #READ
    public function read($table, $id)
    {
        $query =  self::$database->query("SELECT * FROM $table WHERE id = $id");
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    public function readMail($table, $email)
    {
        $query =  self::$database->query("SELECT * FROM $table WHERE email = '$email'");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function readAll($table)
    {
        $query =  self::$database->query("SELECT * FROM $table");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    #DELETE$id
    public function delete($table, $id)
    {
        self::$database->query("DELETE FROM $table WHERE id = $id");
        return true;
    }
    #UPDATE
    public function update($table, $id, $fields)
    {
        $updateSet = [];
        $params = [];

        foreach ($fields as $field => $value) {
            $updateSet[] = "$field = :$field";
            $params[$field] = $value;
        }
        $params['id'] = $id;
        $updateSetString = implode(", ", $updateSet);
        $sql = "UPDATE $table SET $updateSetString WHERE id = :id";

        $stmt = self::$database->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0;
    }
}
ORM::$database = (new \db\Modeldatabase())->getConnection();
