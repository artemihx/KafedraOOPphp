<?php

namespace Project\Controllers;

use Models\Users\User;
use Project\Exception\InvalidArgumentException;
use Project\Models\Users\UsersAuthService;
use View\View;

class UsersController extends AbstractController
{
    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if ($user instanceof User) {
                $this->view->renderHtml('users/singUpSuccess.php');
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/login.php');
    }
    public function logout()
    {
        UsersAuthService::deleteToken();
        $this->view->renderHtml('/users/logout.php');
    }
}
