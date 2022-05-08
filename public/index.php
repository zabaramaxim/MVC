<?php

namespace App;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__). '/vendor/autoload.php';

$config = require(__DIR__ . '/../config/routes.php');

$application = new Application($config);
$application->start();










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

