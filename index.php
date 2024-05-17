<?php

define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core','autoload.php']));

require_once('src/routes.php');
use Core\Router;
use Core\Core;

Router::useStaticRoutes(true);

$app = new Core();
$app->run();



/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<h3>Données $_POST</h3>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}

if (!empty($_GET)) {
    echo '<h3>Données $_GET</h3>';
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';
}

echo '<h3>Données $_SERVER</h3>';
echo '<pre>';
print_r($_SERVER);
echo '</pre>';*/
