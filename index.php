<?php

require 'app/lib/Error.php';
use app\core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

session_start();

$_SESSION['POST'] = [
    'first_name' => '',
    'last_name' => '',
    'birthdate' => '',
    'report_subject' => '',
    'country' => '',
    'phone' => '',
    'email' => ''
];

$_SESSION['POST2'] = [
    'first_name' => '',
    'last_name' => '',
    'birthdate' => '',
    'report_subject' => '',
    'country' => '',
    'phone' => '',
    'email' => '',
    'company' => '',
    'position' => '',
    'about_me' => ''
];

$router = new Router();
$router->run();