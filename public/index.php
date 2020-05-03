<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/constants.php';
require_once dirname(__DIR__) . '/config/functions.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//set_error_handler('Core\Error::errorHandler');
//set_exception_handler('Core\Error::exceptionHandler');

session_start();

$router = new Core\Router();
require_once dirname(__DIR__) . '/routes/web.php';

if ( ! preg_match('/assets/i', $_SERVER['REQUEST_URI'])) {
    $router->dispatch($_SERVER['REQUEST_URI']);
}

