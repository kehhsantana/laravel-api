<?php

namespace App\Repositories\Users;

interface UsersRepositoryInterface
{
    public function find($id);

    public function updateWallet($id, $value);
}

