<?php
namespace App\Exceptions\Login;

use App\Exceptions\AppException;

class LoginException extends AppException {}

class UserNotFoundException extends LoginException {
    public function __construct(string $message = "Користувач не знайдений", int $code = 101) {
        parent::__construct($message, $code);
    }
}

class WrongPasswordException extends LoginException {
    public function __construct(string $message = "Неправильний пароль", int $code = 102) {
        parent::__construct($message, $code);
    }
}

class AccountLockedException extends LoginException {
    public function __construct(string $message = "Обліковий запис заблоковано", int $code = 103) {
        parent::__construct($message, $code);
    }
}

?>