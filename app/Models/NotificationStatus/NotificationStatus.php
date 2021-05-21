<?php

namespace App\Models\NotificationStatus;

use Illuminate\Database\Eloquent\Model;

class NotificationStatus extends Model
{
    protected $table = 'notification_status';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'description',
    ];

}