<?php
namespace App\Exceptions\Registration;

use App\Exceptions\Registration\RegistrationException;

class InvalidSurnameException extends RegistrationException {
    public function __construct(string $message = "Невірний формат прізвища", int $code = 204) {
        parent::__construct($message, $code);
    }
}
?>