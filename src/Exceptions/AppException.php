<?php
namespace App\Exceptions;

class AppException  extends \Exception{
    protected int $errorCode;

    public function __construct(string $message = "Undefined error", int $errorCode = 0){
        $this->errorCode = $errorCode;
        return parent::__construct($message, $errorCode);
    }

    public function getErrorCode(): int{
        return $this->errorCode;
    }

    public function getFullMessage(): string{
        return "[Error {$this->errorCode}]: {$this->getMessage()}";
    }
}

?>