<?php
namespace App;
use App\Request;

class Router
{
    public array $routes;
    public Request $request;
    public array $params;

    public function __construct($routes)
    {
        $this->request = new Request();
        $this->routes = $routes;
        $this->matcher();
    }

//    public function add(string $name, string $url, $nameclass, $action)
//    {
//        $this->routes []= ['name' => $name, 'url' => $url, 'class' => $nameclass, 'action' => $action];
//    }

    public function matcher()
    {
        foreach($this->routes as $route) {
            if (preg_match($route['path'], $this->request->path())) {
//                echo $route['path'], ' ', $route['controller'], ' ',  $route['action'], ' ', $this->request->path();
                $route['path'] = $this->request->path();
                $this->params = $route;
            }
        }
        //eror 404;
    }

    public function getControllerName()
    {
        return $this->params['controller'];
    }

    public function getActionName()
    {
        return $this->params['action'];
    }
}