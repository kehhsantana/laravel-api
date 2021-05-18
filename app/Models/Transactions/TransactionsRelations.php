<?php

namespace App\Models\Transactions;

Trait TransactionsRelations 
{
    public function payer()
    {
        return $this->hasOne('App\Models\Users\Users', 'id', 'payer_user_id');
    }

    public function payee()
    {
        return $this->hasOne('App\Models\Users\Users', 'id', 'payee_user_id');
    }

    public function status()
    {
        return $this->hasOne('App\Models\TransactionStatus\TransactionStatus', 'transaction_status_id', 'id');
    }
}