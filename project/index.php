<?php

use Models\Articles\Article;
use Models\Users\User;
use Project\Exception\NotFoundException;
use View\View;

function myAutoLoader(string $classname) : void
{
    $classname = str_replace('Project\\', '', $classname);
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $classname) . '.php';
    require_once $filePath;
}

try {
    spl_autoload_register('myAutoLoader');

    /*
    $controller = new \Controllers\MainController();

    if(!empty($_GET['name']))
    {
        $controller->sayHello($_GET['name']);
    } else {
        $controller->main();
    }
    */

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/Routes.php';
    $route = ltrim($route, '/');

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            if (!empty($matches)) {
                $isRouteFound = true;
                break;
            }
        }
    }

    if (!$isRouteFound) {
        throw  new \Project\Exception\NotFoundException();
    }
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName($matches[1]);
} catch (Exception $e)
{
    $view = new View(__DIR__ . '/../templates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
}
catch (NotFoundException $e) {
    $view = new View(__DIR__ . '/../templates/errors');
    $view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
}
?>