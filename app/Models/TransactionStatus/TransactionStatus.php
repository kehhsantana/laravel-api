<?php

namespace App\Models\TransactionStatus;

use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    protected $table = 'transaction_status';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'description',
    ];

}