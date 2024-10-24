<?php

namespace Controllers;

class MainController
{
    public function main()
    {
        include __DIR__ . '/../templates/main.php';
    }

    public function sayHello(string $name)
    {
        echo 'Привет, ' . $name;
    }

    public function sayBye(string $name)
    {
        echo 'Пока, ' . $name;
    }
}