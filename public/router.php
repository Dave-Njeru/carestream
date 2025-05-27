<?php

$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/projects/carestream/public/' => 'controllers/index.php',
    '/projects/carestream/public/login' => 'controllers/login.php',
    '/projects/carestream/public/register' => 'controllers/register.php',
    '/projects/carestream/public/verify' => 'controllers/verify.php',
    '/projects/carestream/public/admin' => 'controllers/admin.php',
    '/projects/carestream/public/admin/doctor' => 'controllers/admin_doctor.php',
    '/projects/carestream/public/patient' => 'controllers/patient.php',''
];

function routeToController($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    } else {
        abort();
    }
}

function abort()
{
    require 'views/404.php';
}

routeToController($url, $routes);
