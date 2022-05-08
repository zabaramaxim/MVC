<?php
return [
    'routes' => [
        'home' => ['path' => '/^\/$/', 'controller' => 'HomeController', 'action' => 'home'],
        'all_books' => ['path' => '/^\/all_books$/', 'controller' => 'BookCollectionController', 'action' => 'getAllBooks'],
        'horror_books' => ['path' => '/^\/horror_books$/', 'controller' => 'BookCollectionController', 'action' => 'horrorBooks'],

    ]
];