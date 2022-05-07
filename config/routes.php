<?php
return [
    'routes' => [
        'home' => ['path' => '/^\/$/', 'controller' => 'HomeController', 'action' => 'home'],
        'blog' => ['path' => '/^\/blog_list$/', 'controller' => 'TestController', 'action' => 'blog'],
        'list' => ['path' => '/^\/list$/', 'controller' => 'ListController', 'action' => 'list']
    ]
];