<?php

namespace App\Models\Notifications;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'transaction_id',
        'notification_status_id',
        'creation_date'
    ];
}
