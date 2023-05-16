<?php

function path_info()
{
    return $_SERVER['PATH_INFO'] ?? '/';
}

$route_list = [];

function route($method, $path, $function, $params = []): void
{
    $function = explode('@', $function);
    $GLOBALS['route_list'][$path] = [
        'method' => $method,
        'controller' => $function[0],
        'function' => $function[1],
        'params' => $params,
    ];
}

require realpath('routes/web.php');

$real_path = implode('/', array_filter(explode('/', path_info())));

if (!$real_path) {
    $real_path = "/";
}

if (isset($route_list[$real_path])) {
    if ($_SERVER["REQUEST_METHOD"] != $route_list[$real_path]['method']) {
        throw new Exception("Method not support for this route");
    }

    $route_request_params = $route_list[$real_path]['params'];
    if (count($route_request_params)) {
        foreach ($route_request_params as $key => $value) {
            if (isset($_REQUEST[$key])) {
                $route_list[$real_path]['params'][$key] = $_REQUEST[$key];
            } else {
                throw new Exception("{$key} Required");
            }
        }
    }
    $route = $route_list[$real_path];
    require realpath('app/controller/' . $route['controller'] . ".php");

    call_user_func(
        $route['function'],
        $route['params']
    );
} else {
    echo "Error 404 ";
}