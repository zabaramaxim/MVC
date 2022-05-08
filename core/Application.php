<?php

namespace App;

use Exception;
//use App\Request;
use App\Router;

class Application
{
    public Router $router;
//    public Request $request;
    public Response $response;
    public array $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }
    public function start($config = [])
    {
        $this->router = new Router($this->config['routes']);
        try {
            if (empty($this->router->params)){
                throw new Exception('Route: ' . '"' . $_SERVER['REQUEST_URI'] . '"' . ' not found.');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
        $this->response = new Response();
        $this->router->matcher();
        $this->execute();
    }

    public function execute()
    {
        $controllerName = $this->router->getControllerName();
        $controllerClass = '\Controller' . '\\' . $controllerName;
        try {
            if (class_exists($controllerClass)){
                $controller = new $controllerClass;
            } else {
                throw new Exception('Controller: ' . '"' . $controllerName . '"' .' do not exist on URI: ' . $_SERVER['REQUEST_URI']);
            }
            if (method_exists($controllerClass, $this->router->getActionName())){
                $content = call_user_func(array($controller, $this->router->getActionName()));
                $this->response->setResponse($content);
            } else {
                throw new Exception('Action:' . '"' .$this->router->getActionName() . '"' .' do not exist on URI: ' .  $_SERVER['REQUEST_URI']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        echo $this->response->getResponse();

    }


}