<?php

namespace App\Traits;

trait Wallet
{
    public function sub($wallet, $value) 
    {
        return $wallet - $value;
    }

    public function add($wallet, $value) 
    {
        return $wallet + $value;
    }
}