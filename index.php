<?php

use application\core\Router;
require __DIR__.'/vendor/autoload.php';

spl_autoload_register(function($class) {
    $path = str_replace('\\','/', $class.'.php');
    if(file_exists($path)) require $path;
});

$router = new Router;
$router->run();