<?php
namespace App\Exceptions\Login;

use App\Exceptions\Login\LoginException;

class UserNotFoundException extends LoginException {
    public function __construct(string $message = "Користувач не знайдений", int $code = 101) {
        parent::__construct($message, $code);
    }
}
?>