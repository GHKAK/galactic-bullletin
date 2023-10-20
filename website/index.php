<?php
include 'includes/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$cleaned_uri = strtok($uri, '?');

$segments = explode('/', $cleaned_uri);

$controller = !empty($segments[1]) ? ucfirst($segments[1]) . 'Controller' : 'HomeController';

$articleId = isset($_GET['id']) ? $_GET['id'] : null;

if ($segments[1] == "index.php") {
    $controller = "HomeController";
}

$controllerFile = 'controllers/' . $controller . '.php';
if (file_exists($controllerFile)) {
    include $controllerFile;

    switch ($controller) {
        case 'HomeController':
            $controllerInstance = new $controller();
            $action = !empty($segments[2]) ? $segments[2] : 'index';
            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            }
            break;
        case 'ArticleController':
            $controllerInstance = new $controller();

            $action = !empty($segments[2]) ? $segments[2] : 'show';
            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            }
            break;
        default:
            break;
    }
}
