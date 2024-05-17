<?php

use Core\Router;

Router::connect('/', ['controller' => 'App', 'action' => 'index']);
Router::connect('/register', ['controller' => 'User', 'action' => 'add']);
Router::connect('/login', ['controller' => 'User', 'action' => 'login']);
Router::connect('/accueil', ['controller' => 'User', 'action' => 'show']);


#DB ROUTES
/*Router::connect('/save', ['controller' => 'User', 'action' => 'register']);
Router::connect('/read', ['controller' => 'User', 'action' => 'read']);
Router::connect('/readAll', ['controller' => 'User', 'action' => 'readAll']);
Router::connect('/update', ['controller' => 'User', 'action' => 'update']);
Router::connect('/delete', ['controller' => 'User', 'action' => 'delete']);*/

#DB ORM
Router::connect('/connexion', ['controller' => 'User', 'action' => 'connexionOrm']);
Router::connect('/create', ['controller' => 'User', 'action' => 'create']);
Router::connect('/deleteUser', ['controller' => 'User', 'action' => 'deleteOrm']);
Router::connect('/read', ['controller' => 'User', 'action' => 'read']);
Router::connect('/readAll', ['controller' => 'User', 'action' => 'readAll']);
Router::connect('/update', ['controller' => 'User', 'action' => 'update']);








#ORM
Router::connect('/orm', ['controller' => 'User', 'action' => 'test']);
