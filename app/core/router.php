<?php

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/login';


$routes = [

        '/apprenant/inscription' => [
            'controller' => '../app/controllers/AuthController.php',
            'action' => 'inscription'
        ],
        '/login' => [
            'controller' => '../app/controllers/AuthController.php',
            'action' => 'login'
        ],
        '/logout' => [
            'controller' => '../app/controllers/AuthController.php',
            'action' => 'logout'
        ],
        '/apprenant/dashboard' => [
            'controller' => '../app/controllers/ApprenantController.php',
            'action' => 'dashboard'
        ],
        '/gerant/dashboard' => [
            'controller' => '../app/controllers/GerantController.php',
            'action' => 'dashboard'
        ]
    
];

if (isset($routes[$uri])) {
    require_once $routes[$uri]['controller'];
    $function = $routes[$uri]['action'];
    $function();
} else {
    echo "404 - Page non trouvée";
}