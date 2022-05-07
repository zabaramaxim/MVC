<?php
namespace Controller;

use App\BaseController;
use http\Env\Response;

class HomeController extends BaseController
{
    public function home()
    {
//        echo 'HomeController';
        return $this->render('home.php', ['name' => 'HomeController', 'say' => 'hello']);
    }
}

