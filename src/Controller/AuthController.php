<?php

namespace App\Controller;

use App\Service\AuthService;
use App\Exceptions\Login\LoginException;
use App\Exceptions\Registration\RegistrationException;

class AuthController
{

    public function __construct(private AuthService $authService) {}

    private function redirectToMainPage(){
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
        }
    }

    public function login(): void
    {
        $this->redirectToMainPage();

        ob_start();
        require __DIR__ . '/../../views/auth/login-form.php';
        $content = ob_get_clean();
        require __DIR__ . '/../../views/auth/layout.php';
    }

    public function registration(): void
    {
        $this->redirectToMainPage();

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
            header('Location: /');
        } catch (LoginException $e) {
            header('Location: /login');
        }
    }

    public function registrationAction(): void
    {
        $name = $_POST["name"] ?? "";
        $surname = $_POST["surname"] ?? "";
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";
        $repeatPassword = $_POST["repeat-password"] ?? "";

        try {
            $this->authService->registration($name, $surname, $email, $password, $repeatPassword);
            header('Location: /');
        } catch (RegistrationException $e) {
            header('Location: /registration');
        }
    }
}
