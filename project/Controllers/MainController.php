<?php

namespace Controllers;

use Models\Articles\Article;
use Project\Controllers\AbstractController;
use Project\Models\Users\UsersAuthService;
use Services\Db;
use View\View;

class MainController extends AbstractController
{
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
        $title = 'Страница приветствия';
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => $title]);
    }

    public function sayBye(string $name)
    {
        echo 'Пока, ' . $name;
    }
}