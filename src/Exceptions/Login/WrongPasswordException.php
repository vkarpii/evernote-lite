<?php 
namespace App\Exceptions\Login;

use App\Exceptions\Login\LoginException;

class WrongPasswordException extends LoginException {
    public function __construct(string $message = "Неправильний пароль", int $code = 102) {
        parent::__construct($message, $code);
    }
}

?>