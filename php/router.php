<?php

$path = !empty($_GET) ? $_GET['path'] : '';
$routes = [
    '' => 'index',
    'add-lecturer' => 'add-lecturer',
    'delete-lecturer' => 'delete-lecturer',
];
$action = $routes[$path];

if (empty($action)) {
    // header('HTTP/1.0 404 Not Found');
    http_response_code(404);
    exit;
}

require __DIR__ . '/actions/' . $action . '.php';
exit;