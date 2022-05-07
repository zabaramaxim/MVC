<?php

namespace App;

use App\Request;
use App\Router;

class Application
{
    public Router $router;
    public Request $request;
    public array $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }
    public function run($config = [])
    {
//        $this->request = new Request();
        $this->router = new Router($this->config['routes']);
        $this->router->matcher();
        print_r($this->router->params);
        $this->execute();



    }

    public function execute()
    {
        $controllerName = $this->router->getControllerName();
        $controllerClass = '\Controller' . '\\' . $controllerName;
        if (class_exists($controllerClass)){
            $controller = new $controllerClass;
            if (method_exists($controllerClass, $this->router->getActionName() )){
                call_user_func(array($controller, $this->router->getActionName()));
            }
        }
//        echo $this->router->getControllerName();
//        echo $this->router->getActionName();
    }
}