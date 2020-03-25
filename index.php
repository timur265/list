<?php

require 'app/lib/Dev.php';

use app\core\Router;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();

$query = $_SERVER['QUERY_STRING'];
$router = new Router;
$router->dispatch($query);