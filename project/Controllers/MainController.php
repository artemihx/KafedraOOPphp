<?php

namespace Controllers;

use Models\Articles\Article;
use Services\Db;
use View\View;

class MainController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
        $this->db = Db::getInstance();
    }
    public function main(): void
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name): void
    {
        $title = 'Страница приветствия';
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => $title]);
    }

    public function sayBye(string $name): void
    {
        echo 'Пока, ' . $name;
    }
}