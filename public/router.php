<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/projects/carestream/public/' => 'controllers/index.php',
    '/projects/carestream/public/login' => 'controllers/login.php',
];

function routeToController($url, $routes) {
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    } else {
        echo 'Route not found';
    }
}

routeToController($url, $routes);
?>