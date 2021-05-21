<?php

namespace App\Exceptions;

use App\Exceptions\CustomExceptions;

class NotificationErrorExceptions extends CustomExceptions
{
    public function __construct($message)
    {
        parent::__construct($message, 401);
    }
}
