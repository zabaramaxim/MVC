<?php

namespace App;

class BaseController
{
    protected function render(string $template, array $params = [])
    {
        extract($params);
        ob_start();

        require __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();

//        echo $name;
        echo $content;
    }
}