<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Exceptions\Login\UserNotFoundException;
use App\Exceptions\Login\WrongPasswordException;
use App\Exceptions\Registration\EmailAlreadyExistsException;
use App\Exceptions\Registration\InvalidEmailException;
use App\Exceptions\Registration\InvalidNameException;
use App\Exceptions\Registration\InvalidSurnameException;
use App\Exceptions\Registration\PasswordDoesntMatchException;
use App\Exceptions\Registration\WeakPasswordException;

class AuthService{

    public function __construct(private UserRepository $users) {}

    public function login(string $email, string $password): bool{
        $email = strtolower(trim($email));

        $user = $this->users->findByEmail($email);

        if (!$user) {
            throw new UserNotFoundException();
        }
        if (!password_verify($password, $user['password'])) {
             throw new WrongPasswordException();
        }

        $this->users->updateLastLogin($user['id']);
        $_SESSION['user_id'] = $user['id'];
        return true;
    }

    private function isStrongPassword(string $password): bool{
        return strlen($password) >= 8
            && preg_match('/[A-Z]/', $password)
            && preg_match('/[a-z]/', $password)
            && preg_match('/[0-9]/', $password);
    }

    private function isValidName(string $value): bool{
        $value = trim($value);
        $length = strlen($value);

        return $length >= 2
            && $length <= 50
            && !preg_match('/[0-9]/', $value);
    }

    public function registration(
        string $name, 
        string $surname, 
        string $email, 
        string $password, 
        string $repeatPassword
    ): bool{
        $name = trim($name);
        $surname = trim($surname);
        $email = strtolower(trim($email));

        if (!$this->isValidName($name)) {
            throw new InvalidNameException();
        }

        if (!$this->isValidName($surname)) {
            throw new InvalidSurnameException();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException();
        }

        if ($this->isStrongPassword($password)) {
            throw new WeakPasswordException();
        }

        if ($password !== $repeatPassword) {
            throw new PasswordDoesntMatchException();
        }
        unset($repeatPassword);

        if ($this->users->isEmailExist($email)) {
            throw new EmailAlreadyExistsException();
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        unset($password);

        $userId = $this->users->createUser($name, $surname, $email, $hash);
        $_SESSION['user_id'] = $userId;

        return true;
    }
}
