<?php

namespace App\Controller;

use App\Service\AuthService;
use App\Exceptions\Login\LoginException;

class AuthController
{
    public function __construct(private AuthService $authService)
    {}

    public function login(): void
    {
        ob_start();
        require __DIR__ . '/../../views/auth/login-form.php';
        $content = ob_get_clean();
        require __DIR__ . '/../../views/auth/layout.php';
    }

    public function registration(): void
    {
        ob_start();
        require __DIR__ . '/../../views/auth/register-form.php';
        $content = ob_get_clean();
        require __DIR__ . '/../../views/auth/layout.php';
    }

    public function loginAction(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        try {
            $this->authService->login($email, $password);
            #redirect to main page
        } catch (LoginException $e) {
            header('Location: /login');
        }
/*
        if($email === '' || $password === ''){
            $_SESSION['error'] = 'Заповніть всі поля';
            header('Location: /login');
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'Некоректний email';
            header('Location: /login');
        }

        $result = $this->authService->login($email, $password);

        echo $email."  ".$password;
        echo $_SESSION['user_id'];*/
        }
}
