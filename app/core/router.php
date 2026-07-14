<?php

$page = isset($_GET['page']) ? $_GET['page'] : '/login';

$routes = [

    '/inscription' => [
            'controller' => '../app/controllers/AuthController.php',
            'action' => 'inscription'
        ],
        '/login' => [
            'controller' => '../app/controllers/AuthController.php',
            'action' => 'login'
        ],
        '/apprenant/dashboard ' => [
            'controller' => '../app/controllers/ApprenantController.php',
            'action' => 'dashboard'
        ]
    
];

if (isset($routes[$page])) {
    require_once $routes[$page]['controller'];
    $function = $routes[$page]['action'];
    $function();
} else {
    echo "404 - Page non trouvée";
}