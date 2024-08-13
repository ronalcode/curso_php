<?php

/**Las primeras 3 lineas son para mostrar los errores de php en el navegador. Eso es algo que se puede hacer en el archivo de php.ini */

use Core\Session;
use Core\ValidationException;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . '/vendor/autoload.php';

session_start();

require BASE_PATH . 'Core/functions.php';

// spl_autoload_register(function ($class) {
//     // Core\Database and I need to reemplace in require path

//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

//     require(base_path("{$class}.php"));
// });


require base_path('bootstrap.php');

$router = new \Core\Router;
$routes =  require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();
