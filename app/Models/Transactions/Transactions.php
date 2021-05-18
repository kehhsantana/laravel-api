<?php

namespace App\Models\Transactions;

use App\Models\Transactions\TransactionsRelations;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use TransactionsRelations;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    public $timestamp = false;

    protected $fillable = [
        'payer_user_id',
        'payee_user_id',
        'value',
        'transaction_status_id'
    ];

}