<?php

use Models\Articles\Article;
use Models\Users\User;

function myAutoLoader(string $classname)
{
    $classname = str_replace('Project\\', '', $classname);
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $classname) . '.php';
    require_once $filePath;
}

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
    if(!empty($matches))
    {
        if(!empty($matches))
        {
            $isRouteFound = true;
            break;
        }
    }
}

if(!$isRouteFound)
{
    echo 'Страница не найдена!';
    return;
}
$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);
?>