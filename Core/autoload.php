<?php

spl_autoload_register(function ($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    $directories = [
        '',
        'Core/',
        'src/',
        'src/Controller/',
        'src/Model/',
        'src/View/',
    ];

    foreach ($directories as $directory) {
        $fullPath = $directory . $className;
        if (file_exists($fullPath)) {
            require_once $fullPath;
            break;
        }
    }
});
