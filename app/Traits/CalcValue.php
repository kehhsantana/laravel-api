<?php

namespace App\Traits;

trait CalcValue
{
    public function subCalc($num1, $num2) 
    {
        return $num1 - $num2;
    }

    public function addCalc($num1, $num2) 
    {
        return $num1 + $num2;
    }
}