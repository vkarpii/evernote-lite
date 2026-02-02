<?php
namespace App\Exceptions\Registration;

use App\Exceptions\Registration\RegistrationException;

class PasswordDoesntMatchException extends RegistrationException {
    public function __construct(string $message = "Паролі не збігаються", int $code = 203) {
        parent::__construct($message, $code);
    }
}
?>