<?php
namespace App\Exceptions\Registration;

use App\Exceptions\AppException;

class RegistrationException extends AppException {}

class EmailAlreadyExistsException extends RegistrationException {
    public function __construct(string $message = "Електронна пошта вже використовується", int $code = 201) {
        parent::__construct($message, $code);
    }
}

class WeakPasswordException extends RegistrationException {
    public function __construct(string $message = "Пароль занадто слабкий", int $code = 202) {
        parent::__construct($message, $code);
    }
}

class InvalidEmailException extends RegistrationException {
    public function __construct(string $message = "Невірний формат електронної пошти", int $code = 203) {
        parent::__construct($message, $code);
    }
}

?>