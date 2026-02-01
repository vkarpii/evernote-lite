<?php
namespace App\Exceptions;

use Throwable;

class AppException  extends \Exception{
    protected int $code;

    public function __construct(string $message = "Undefined error", int $code = 0){
        $this->code = $code;
        return parent::__construct($message, $code);
    }

    public function getErrorCode(): int{
        return $this->code;
    }

    public function getFullMessage(): string{
        return "[Error {$this->code}]: {$this->getMessage()}";
    }
}

?>