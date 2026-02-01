<?php
namespace App\Service;

use App\Repository\UserRepository;
use App\Exceptions\Login\UserNotFoundException;

class AuthService{

    public function __construct(private UserRepository $users)
    {}

    public function login(string $email, string $password): bool{
        $user = $this->users->findByEmail($email);

        if (!$user) {
            throw new UserNotFoundException();
        }
        /*
        if (!password_verify($password, $user->getPasswordHash())) {
            throw new WrongPasswordException();
        }
        */

        $_SESSION['user_id'] = $user['id'];
        return true;
    }
}

?>