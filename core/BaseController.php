<?php

namespace App;
use Twig;


class BaseController
{
    protected $twig;

    protected function initTwig()
    {
        $loader = new Twig\Loader\FilesystemLoader('../views/');
        $this->twig = new Twig\Environment($loader);
    }
    protected function render(string $template, array $params = [])
    {
        ob_start();
        extract($params);
        require __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function getClassName()
    {
         return substr(strchr(static::class, '\\'),1);
    }
}