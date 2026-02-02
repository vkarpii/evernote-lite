<?php
namespace App\Exceptions\Registration;

use App\Exceptions\Registration\RegistrationException;

class InvalidEmailException extends RegistrationException {
    public function __construct(string $message = "Невірний формат електронної пошти", int $code = 204) {
        parent::__construct($message, $code);
    }
}
?>