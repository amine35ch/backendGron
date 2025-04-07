<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class CustomException extends Exception
{
    public function __construct($message = "Une erreur inattendue s'est produite.")
    {
        parent::__construct($message);
    }

    public function render(): Response
    {
        $status = 400;

        return response(['message' => $this->message], $status);
    }
}
