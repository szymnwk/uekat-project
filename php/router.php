<?php

$path = !empty($_GET) ? $_GET['path'] : '';
// echo dirname('php/routing/routes.php');
$routes = [
    '' => 'index',
    'api/lecturers/all' => 'get-all-lecturers',
];
$action = $routes[$path];

if (empty($action)) {
    header('HTTP/1.0 404 Not Found');
    exit;
}

require __DIR__ . '/actions/' . $action . '.php';
exit;