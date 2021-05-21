<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions\TransactionsRelations;
class Transactions extends Model
{
    use TransactionsRelations;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'payer_user_id',
        'payee_user_id',
        'value',
        'transaction_status_id'
    ];

}