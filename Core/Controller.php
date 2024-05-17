<?php

namespace Core;

class Controller
{
    protected $_render;
    public function __destruct()
    {
        echo $this->_render;  // Affiche le contenu final lors de la destruction de l'objet
    }

    protected function render($view, $scope = [])
    {
        extract($scope);

        $controller = basename(get_class($this));
        $controller = explode("\\", $controller);
        $controller = end($controller);

        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', $controller), $view]) . '.php';

        if (file_exists($f)) {
            ob_start();
            include($f);
            $view = ob_get_clean();

            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
        }
    }
}
