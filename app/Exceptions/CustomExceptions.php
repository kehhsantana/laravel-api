<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class CustomExceptions extends Exception
{
    protected $custom_code; 

    public function __construct($message, $customCode) 
    { 
        parent::__construct($message, $customCode); 

        $this->custom_code = $customCode; 
    } 

    public function getCustomCode() 
    { 
        return $this->custom_code; 
    } 
}
