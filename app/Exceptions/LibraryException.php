<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class LibraryException extends Exception
{
    protected $errors;

    protected $code;

    public function __construct(array|string $errors, int $code = 500)
    {
        $this->errors = is_array($errors) ? $errors : ['error' => $errors];
        $this->code = $code;
    }

    public function render()
    {
        return Response::json($this->errors, $this->code);
    }
}
