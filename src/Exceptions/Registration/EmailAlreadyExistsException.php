<?php
namespace App\Exceptions\Registration;

use App\Exceptions\Registration\RegistrationException;

class EmailAlreadyExistsException extends RegistrationException {
    public function __construct(string $message = "Електронна пошта вже використовується", int $code = 201) {
        parent::__construct($message, $code);
    }
}
?>