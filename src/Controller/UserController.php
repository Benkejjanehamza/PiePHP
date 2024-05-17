<?php

namespace src\Controller;

require_once 'src/Model/UserModel.php';

use Core\Controller;
use Core\Request;
use orm\ORM;
use user\UserModel;

class UserController extends Controller
{
    #METHODE RENDU VIEW
    function addAction()
    {
        $this->render('register');
    }
    public function loginAction()
    {
        $this->render('login');
    }
    public function showAction()
    {
        $this->render('show');
    }

    #CREATE ORM
    public function createAction()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $orm = new \ORM();
        $result = $orm->create('users', array(
            'email' => $email,
            'password' => $password
        ));
        setcookie('user_id', $result, time() + 86400, "/");

        header("Location: /accueil");
        exit;
    }


    #READ
    public function readAllAction()
    {
        $orm = new \ORM();
        $result = $orm->readAll("users");
        foreach ($result as $t) {
            foreach ($t as $key => $r) {
                echo $key . " " . ":" . " " . $r . " " . '<br/>';
            }
            echo '<br />';
        }
    }

    public function readAction()
    {
        $userId = $_COOKIE['user_id'];
        $orm = new \ORM();
        $result = $orm->read('users', $userId);
        foreach ($result as $key => $r) {
            echo $key . " " . ":" . " " . $r . '<br/>';
        }
    }

    #UPDATE ORM
    public function updateAction()
    {
        $userId = $_COOKIE['user_id'];
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $orm = new \ORM();
        $orm->update('users', $userId, array(
            'email' => $email,
            'password' => $password
        ));
    }

    #DELETE ORM
    public function deleteOrmAction()
    {
        $userId = $_COOKIE['user_id'] ?? null;
        var_dump($userId);
        $orm = new \ORM();
        $orm->delete('users', $userId);
        header("Location: /register");
        exit;
    }

    #CONNEXION
    public function connexionOrmAction()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $orm = new \ORM();
        $result = $orm->readMail('users', $email);
        if ($result[0]['password'] === $password) {
            header("Location: /accueil");
            var_dump("toto");
            exit;
        } else {
            header("Location: /login");
        }
    }
}
