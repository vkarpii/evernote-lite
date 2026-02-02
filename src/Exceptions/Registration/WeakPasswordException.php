<?php
namespace App\Exceptions\Registration;

use App\Exceptions\Registration\RegistrationException;

class WeakPasswordException extends RegistrationException {
    public function __construct(string $message = "Пароль занадто слабкий", int $code = 202) {
        parent::__construct($message, $code);
    }
}
?>