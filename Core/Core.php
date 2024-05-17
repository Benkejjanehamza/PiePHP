<?php

namespace Core;

class Core
{
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];

        $route = Router::get($url);

        if ($route) {
            $controllerName = "\\src\\Controller\\" . $route['controller'];
            $actionName = $route['action'];

            if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
                $controller = new $controllerName();
                $controller->$actionName();
            } else {
                $this->sendNotFound();
            }
        } else {
            $this->sendNotFound();
        }
    }

    private function sendNotFound()
    {
        echo "404 - Page not found";
    }
}
