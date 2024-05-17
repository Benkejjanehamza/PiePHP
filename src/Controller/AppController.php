<?php

namespace src\Controller;

use Core\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        echo "Bienvenue sur la page d'accueil.";
    }
}
