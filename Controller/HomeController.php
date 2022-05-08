<?php
namespace Controller;

use App\BaseController;
use Models\BookCollection;

class HomeController extends BaseController
{
    public function home()
    {
        $shining = new BookCollection();
        $shining = $shining->query("Select * from book where title = 'Shining'");
        print_r($shining);
        $controllerName = $this->getClassName();
        $this->initTwig();
        return $this->twig->render('home/index.html.twig', ['name' => $controllerName, 'path' => __DIR__ . '/' . $controllerName]);
    }
}

