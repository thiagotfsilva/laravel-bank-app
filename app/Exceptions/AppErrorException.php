<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class AppErrorException extends Exception
{
    private array $errors;

    public function __construct(
        array $errors =  array(),
        $message = "",
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
