<?php

namespace App\Models\Users;

use App\Models\Users\UsersRelations;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable 
{
    use Notifiable;
    use UsersRelations;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'document', 
        'email', 
        'wallet',
        'user_type_id',
        'creation_date'
    ];

    protected $hidden = [
        'password',
    ];    

}