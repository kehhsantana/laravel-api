<?php

namespace App\Repositories\Transactions;

interface TransactionsRepositoryInterface
{
    public function find($id);

    public function create($payer_user_id, $payee_user_id, $value);

    public function authorized($id);
    
    public function unauthorized($id);
}

