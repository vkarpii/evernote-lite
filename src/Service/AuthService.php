<?php
namespace App\Service;

use App\Repository\UserRepository;

class AuthService{

    public function __construct(private UserRepository $users)
    {}

    public function login(string $email, string $password): bool
    {
        $user = $this->users->findByEmail($email);

        if (!$user) {
            return false;
        }
        # if (!password_verify($password, $user['password'])) {
        if ($password !== $user['password']) {
            return false;
        }

        $_SESSION['user_id'] = $user['id'];
        return true;
    }
}

?>