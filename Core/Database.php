<?php

namespace db;

class Modeldatabase
{
    private $host = 'localhost';
    private $dbname = 'mvc';
    private $user = 'toto';
    private $password = 'Benkejjane69007@@';
    protected $connection;

    public function __construct()
    {
        try {
            $this->connection = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
