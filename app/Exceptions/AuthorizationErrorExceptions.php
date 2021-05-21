<?php

namespace App\Exceptions;

use App\Exceptions\CustomExceptions;

class AuthorizationErrorExceptions extends CustomExceptions
{
    public function __construct($message)
    {
        parent::__construct($message, 401);
    }
}
