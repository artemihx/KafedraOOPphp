<?php

return [
    '~^hello/(.*)$~' => [\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\Controllers\MainController::class, 'main'],
    '~^bye/(.*)$~' => [\Controllers\MainController::class, 'sayBye'],
    '~^articles/(\d+)$~' => [\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\Controllers\ArticlesController::class, 'add'],
    '~^users/register$~' => [Project\Controllers\UsersController::class, 'signUp'],
    '~^users/login$~' => [Project\Controllers\UsersController::class, 'login'],
    '~^users/logout$~' => [Project\Controllers\UsersController::class, 'logout'],
];