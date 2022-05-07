<?php

namespace App;

use App\Application;
use App\TestController;
use App\Request;
use App\Router;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__). '/vendor/autoload.php';

$config = require(__DIR__ . '/../config/routes.php');
//print_r($config);

$application = new Application($config);
//print_r($application->config);
$application->run();










//if (method_exists(TestController::class, 'path' )){
//    ob_start();
//    call_user_func(array($controller, $router->params['action']));
//    $output = ob_get_contents();
//    ob_end_clean();
//    var_dump($output);
//}

//$router->add('test', '/\/test/', TestController::class, 'test');
//$router->add('home', '/^\/home_page$/', TestController::class, 'home');
//print_r($router->routes);
//$router->resolve();/

