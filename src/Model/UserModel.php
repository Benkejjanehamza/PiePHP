<?php

namespace user;

require_once 'Core/Database.php';

class UserModel extends \db\Modeldatabase
{
    private $email;
    private $password;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function save()
    {
        $query = "INSERT INTO users (email, password)
                      VALUES  (:email, :password);";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        return  $this->connection->lastInsertId();
    }
    public function read($id)
    {
        $query = "SELECT * FROM users WHERE id = :id_user;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id_user', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function read_all()
    {
        $query = "SELECT * FROM users;";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function update($id)
    {
        $query = "UPDATE users SET email = :email, password = :password WHERE id = :id_user;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':id_user', $id);
        $stmt->execute();
        return  $this->connection->lastInsertId();
    }
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = :id_user;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id_user', $id);
        $stmt->execute();
        return  $this->connection->lastInsertId();
    }
    #CONNECTION
    public function connexion()
    {
        $query = "SELECT * FROM users WHERE email = :email;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
