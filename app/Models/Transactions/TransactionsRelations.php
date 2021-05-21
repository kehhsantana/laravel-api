<?php

namespace App\Models\Transactions;
Trait TransactionsRelations 
{
    public function payer()
    {
        return $this->hasOne('App\Models\Users\Users', 'payer_user_id', 'id');
    }

    public function payee()
    {
        return $this->hasOne('App\Models\Users\Users', 'payee_user_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\TransactionStatus\TransactionStatus', 'transaction_status_id', 'id');
    }
}