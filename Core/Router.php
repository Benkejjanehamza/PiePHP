<?php

namespace Core;

class Router
{
    // Stocke les routes statiques sous forme de tableau associatif.
    private static $routes = [];

    // Indique si le routeur doit utiliser les routes statiques (true) ou dynamiques (false).
    private static $useStaticRoutes = true;

    /**
     * Définit le mode de routage sur statique ou dynamique.
     * Utiliser true pour un routage statique, false pour un routage dynamique.
     */
    public static function useStaticRoutes($useStatic)
    {
        self::$useStaticRoutes = $useStatic;
    }

    /**
     * Associe une URL à une route spécifique incluant un contrôleur et une action.
     * Cette méthode retire le slash final de l'URL pour normaliser les clés du tableau de routes.
     */
    public static function connect($url, $route)
    {
        self::$routes[rtrim($url, '/')] = $route;
    }

    /**
     * Récupère la route correspondante à l'URL donnée.
     * Retourne un tableau avec 'controller' et 'action' si une correspondance est trouvée,
     * sinon retourne null si aucune route n'est trouvée.
     */
    public static function get($url)
    {
        $urlPath = rtrim(parse_url($url, PHP_URL_PATH), '/');
        $queryString = parse_url($url, PHP_URL_QUERY);
        parse_str($queryString, $params);  // Convertit la chaîne de requête en tableau de paramètres

        // Vérifie d'abord les routes statiques si le routage statique est activé
        if (self::$useStaticRoutes) {
            if (array_key_exists($urlPath, self::$routes)) {
                return [
                    'controller' => self::$routes[$urlPath]['controller'] . 'Controller',
                    'action' => self::$routes[$urlPath]['action'] . 'Action'
                ];
            }
        } else {
            // Si le routage dynamique est activé, utilise les paramètres 'c' (controller) et 'a' (action)
            if (isset($params['c']) && isset($params['a'])) {
                $controller = ucfirst($params['c']);
                $action = $params['a'] . 'Action';
                return [
                    'controller' => $controller . 'Controller',
                    'action' => $action
                ];
            }
        }

        self::sendNotFound();
        exit;
    }
    private static function sendNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        include_once 'src/View/Error/404.php';
    }
}
