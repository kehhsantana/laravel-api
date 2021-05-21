<?php

namespace App\Models\UserType;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_type';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'description', 
    ];

}