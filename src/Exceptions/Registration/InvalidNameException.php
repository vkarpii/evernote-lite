<?php
namespace App\Exceptions\Registration;

use App\Exceptions\Registration\RegistrationException;

class InvalidNameException extends RegistrationException {
    public function __construct(string $message = "Невірний формат ім'я", int $code = 204) {
        parent::__construct($message, $code);
    }
}
?>